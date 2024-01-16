<?php

namespace Tests\ApiContext\Application\Command\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Src\ApiContext\Application\Command\User\CreateUserCommand;
use Src\ApiContext\Application\Command\User\CreateUserHandler;
use Src\ApiContext\Domain\Exception\User\UserEmailInUseException;
use Src\ApiContext\Domain\Model\User\User;
use Src\ApiContext\Domain\ModelView\UserView\UserView;
use Tests\ApiContext\ApiContextUnitTestCase;

class CreateUserHandlerTest extends ApiContextUnitTestCase
{
    use DatabaseTransactions;

    public CreateUserHandler $handler;

    public function setUp(): void
    {
        parent::setUp();
        $this->handler = $this->createUserHandler();
    }

    public function test_should_create_user(): void
    {
        $userName = 'Pepe Perez';
        $userEmail = 'pepeperez@pepemail.com';
        $userPassword = '"PepePassword123!!"';

        $this->handler->__invoke(new CreateUserCommand($userName, $userEmail, Hash::make($userPassword)));

        $databaseUser = $this->userRepository()->getUserByEmail($userEmail);
        $this->assertNotNull($databaseUser);
        $userView = new UserView($databaseUser);

        $this->assertEquals($userView->name(), $userName);
        $this->assertEquals($userView->email(), $userEmail);
        $this->assertTrue(Hash::check($userPassword, $databaseUser->{User::PASSWORD}));
    }

    public function test_should_throw_user_email_in_use_exception_when_using_a_repeated_email(): void
    {
        $userName1 = 'Pepe Perez';
        $userEmail1 = 'pepeperez@pepemail.com';
        $userPassword1 = '"PepePassword123!!"';

        $this->handler->__invoke(new CreateUserCommand($userName1, $userEmail1, Hash::make($userPassword1)));

        $userName2 = 'Pepe Perez 2';
        $userEmail2 = $userEmail1;
        $userPassword2 = '"PepePassword123456!!"';

        $this->expectException(UserEmailInUseException::class);
        $this->handler->__invoke(new CreateUserCommand($userName2, $userEmail2, Hash::make($userPassword2)));
    }
}

<?php

namespace Tests\ApiContext\Application\Query\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Src\ApiContext\Application\Query\User\GetCurrentUserHandler;
use Src\ApiContext\Application\Query\User\GetCurrentUserQuery;
use Src\ApiContext\Domain\Exception\User\UserNotFoundException;
use Src\ApiContext\Domain\Model\User\User;
use Tests\ApiContext\ApiContextUnitTestCase;

class GetCurrentUserHandlerTest extends ApiContextUnitTestCase
{
    use DatabaseTransactions;

    public GetCurrentUserHandler $handler;

    public function setUp(): void
    {
        parent::setUp();
        $this->handler = $this->getCurrentUserHandler();
    }

    public function test_should_get_current_user(): void
    {
        $userName = 'Pepe Perez';
        $userEmail = 'pepeperez@pepemail.com';
        $userPassword = Hash::make("PepePassword123!!");

        $user = new User();
        $user->{User::NAME} = $userName;
        $user->{User::EMAIL} = $userEmail;
        $user->{User::PASSWORD} = $userPassword;

        $this->userRepository()->createUser($user);
        $this->actingAs($user);

        $busResponse = $this->handler->__invoke(new GetCurrentUserQuery());
        $response = $busResponse->data();

        $this->assertEquals($userName, $response[User::NAME]);
        $this->assertEquals($userEmail, $response[User::EMAIL]);
    }

    public function test_should_throw_user_not_found_exception_when_not_logged_in(): void
    {
        $this->expectException(UserNotFoundException::class);
        $this->handler->__invoke(new GetCurrentUserQuery());
    }
}

<?php

namespace App\Console\Commands;

use App\PokeAPIContext\Connectors\PokeApiConnector;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Src\ApiContext\Domain\Model\User\User;

class GetPokeApiDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokeapi:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull all PokeAPI data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Create user to test API functionality
        if (User::where(User::EMAIL, 'test@mail.com')->count() < 1) {

            User::create([
                User::ID => Uuid::uuid4(),
                User::NAME => Str::random(),
                User::EMAIL => 'test@mail.com',
                User::PASSWORD => Hash::make('test'),
                User::REMEMBER_TOKEN => Str::random(10),
                User::EMAIL_VERIFIED_AT => now(),
            ]);
        }

        (new PokeApiConnector())->connect();
    }
}

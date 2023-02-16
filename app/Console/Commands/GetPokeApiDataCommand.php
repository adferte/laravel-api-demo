<?php

namespace App\Console\Commands;

use App\Models\User;
use App\PokeAPI\Connectors\PokeApiConnector;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

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
        // (new PokeApiConnector())->connect();

        // Create user to test API functionality
        if (User::where(User::EMAIL, 'test@mail.com')->count() < 1) {
            User::factory()->create([
                User::EMAIL => 'test@mail.com',
                User::PASSWORD => Hash::make('test'),
            ]);
        }
    }
}

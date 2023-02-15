<?php

namespace App\Console\Commands;

use App\PokeAPI\Connectors\PokeApiConnector;
use Illuminate\Console\Command;

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
        (new PokeApiConnector())->connect();
    }
}

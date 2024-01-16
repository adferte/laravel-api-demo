<?php

namespace Src\ddd\Infrastructure\Bus;

use Illuminate\Support\Facades\App;
use ReflectionClass;
use Src\ddd\Infrastructure\Application\BusResponse;
use Src\ddd\Infrastructure\Application\IQueryBus;

class QueryBus implements IQueryBus
{
    public function handle($query): BusResponse
    {
        $reflection = new ReflectionClass($query);
        $handlerName = str_replace("Query", "Handler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = App::make($handlerName);
        return $handler($query);
    }
}

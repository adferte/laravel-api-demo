<?php

namespace Src\ddd\Infrastructure\Bus;

use Illuminate\Support\Facades\App;
use ReflectionClass;
use Src\ddd\Infrastructure\Application\ICommandBus;

class CommandBus implements ICommandBus
{
    public function handle($command): void
    {
        $reflection = new ReflectionClass($command);
        $handlerName = str_replace("Command", "Handler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = App::make($handlerName);
        $handler($command);
    }
}

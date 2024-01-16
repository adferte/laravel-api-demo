<?php

namespace Src\ddd\Infrastructure\Application;

interface ICommandBus
{
    public function handle($command): void;
}

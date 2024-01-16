<?php

namespace Src\ddd\Infrastructure\Application;

interface IQueryBus
{
    public function handle($query): BusResponse;
}

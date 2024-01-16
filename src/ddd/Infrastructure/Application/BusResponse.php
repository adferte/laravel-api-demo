<?php

namespace Src\ddd\Infrastructure\Application;

class BusResponse
{
    public function __construct(
        private readonly array $data = [])
    {
    }

    public function data(): array
    {
        return $this->data;
    }
}


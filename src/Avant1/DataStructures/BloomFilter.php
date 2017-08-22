<?php

namespace Avant1\DataStructures;

class BloomFilter
{

    private $hash = [];

    public function exists(string $id): bool
    {
        return isset($this->hash[$id]);
    }

    public function add(string $id): void
    {
        $this->hash[$id] = true;
    }
}

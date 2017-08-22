<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter\Storage;


use Avant1\DataStructures\BloomFilter\BloomFilter;
use Avant1\DataStructures\BloomFilter\Storage;

class ArrayStorage implements Storage
{

    private $hash = [];

    public function set(int $offset): void
    {
        $this->hash[$offset] = true;
    }

    public function get(int $offset): bool
    {
        return isset($this->hash[$offset]);
    }

}

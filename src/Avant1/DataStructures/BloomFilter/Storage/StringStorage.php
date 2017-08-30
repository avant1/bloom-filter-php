<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter\Storage;


use Avant1\DataStructures\BloomFilter\Storage;

class StringStorage implements Storage
{

    private $string;

    public function __construct(int $size)
    {
        $this->string = str_repeat("\0", $size);
    }

    public function set(int $offset): void
    {
        $this->string[$offset] = '1';
    }

    public function get(int $offset): bool
    {
        return $this->string[$offset] === '1';
    }


}

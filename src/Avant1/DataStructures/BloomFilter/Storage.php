<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter;


interface Storage
{

    public function set(int $offset): void;

    public function get(int $offset): bool;

}

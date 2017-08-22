<?php

declare(strict_types=1);

namespace Avant1\DataStructures;


interface BloomFilter
{

    public function exists(string $id): bool;

    public function add(string $id): void;


}

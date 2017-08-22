<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter;


interface HashFunction
{

    public function hash(string $input): int;

}

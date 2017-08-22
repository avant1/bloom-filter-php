<?php

declare(strict_types=1);

namespace Avant1\DataStructures\HashFunction;


use Avant1\DataStructures\HashFunction;

class MurmurHashFunction implements HashFunction
{
    public function hash(string $input): int
    {
        return (int)murmurhash3_int($input);
    }

}

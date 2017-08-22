<?php

declare(strict_types=1);

namespace Avant1\DataStructures\HashFunction;


use Avant1\DataStructures\HashFunction;

class MD5HashFunction implements HashFunction
{
    public function hash(string $input): int
    {
        return (int)base_convert(md5($input), 36, 10);
    }

}

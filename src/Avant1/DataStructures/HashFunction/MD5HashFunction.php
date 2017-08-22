<?php

declare(strict_types=1);

namespace Avant1\DataStructures\HashFunction;


use Avant1\DataStructures\HashFunction;

class MD5HashFunction implements HashFunction
{
    public function hash(string $input): string
    {
        return md5($input);
    }

}

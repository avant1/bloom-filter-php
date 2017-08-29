<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter\Benchmark;


class Stopwatch
{

    /** @return float Callback duration */
    public function measure(callable $callback): float
    {
        $start = microtime(true);
        $callback();
        $end = microtime(true);

        return $end - $start;
    }

}

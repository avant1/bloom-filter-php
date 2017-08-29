<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter\Benchmark;


class BenchmarkResult
{

    private $benchmarkDescription;
    private $peakMemoryUsage;
    private $runtime;

    public function __construct(string $benchmarkDescription, float $peakMemoryUsage, float $runtime)
    {
        $this->benchmarkDescription = $benchmarkDescription;
        $this->peakMemoryUsage = $peakMemoryUsage;
        $this->runtime = $runtime;
    }

}

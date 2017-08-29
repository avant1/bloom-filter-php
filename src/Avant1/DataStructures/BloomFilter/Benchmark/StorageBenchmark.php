<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter\Benchmark;


use Avant1\DataStructures\BloomFilter\Storage;

class StorageBenchmark
{

    private $stopwatch;

    public function __construct(Stopwatch $stopwatch)
    {
        $this->stopwatch = $stopwatch;
    }

    public function storeItems(int $itemsCount, Storage $storage): BenchmarkResult
    {
        //todo does usage of variables from outer scope slow down function?
        $callback = function() use ($itemsCount, $storage) {
            for ($i = 0; $i < $itemsCount; $i++) {
                $storage->set($i);
            }
        };

        $runtime = $this->stopwatch->measure($callback);
        $memoryUsage = memory_get_peak_usage(true);
        $description = sprintf('Store %s items in %s storage', $itemsCount, get_class($storage));

        return new BenchmarkResult($description, $memoryUsage, $runtime);
    }



}

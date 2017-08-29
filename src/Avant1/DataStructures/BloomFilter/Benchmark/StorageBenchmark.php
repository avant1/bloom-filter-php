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
        $description = sprintf('Store %s items in %s storage', $itemsCount, $this->getReadableStorageName($storage));

        return new BenchmarkResult($description, $memoryUsage, $runtime);
    }

    private function getReadableStorageName(Storage $storage): string
    {
        return get_class($storage);
    }

    public function retreiveItems(int $itemsCountToInsert, int $itemsCountToRetreive, Storage $storage): BenchmarkResult
    {
        //retreiving data from empty storage does not make much sense
        for ($i = 0; $i < $itemsCountToInsert; $i++) {
            $storage->set($i);
        }

        $itemsToRetreive = range(0, $itemsCountToRetreive, 1);
        $callback = function() use ($storage, $itemsToRetreive) {
            foreach ($itemsToRetreive as $item) {
                $storage->get($item);
            }
        };

        $runtime = $this->stopwatch->measure($callback);
        $memoryUsage = memory_get_peak_usage(true);
        $description = sprintf('Store %s items and then retreive %s items from %s storage', $itemsCountToInsert, $itemsCountToRetreive, $this->getReadableStorageName($storage));

        return new BenchmarkResult($description, $memoryUsage, $runtime);
    }


}

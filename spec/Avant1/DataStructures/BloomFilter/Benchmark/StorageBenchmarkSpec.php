<?php

namespace spec\Avant1\DataStructures\BloomFilter\Benchmark;

use Avant1\DataStructures\BloomFilter\Benchmark\BenchmarkResult;
use Avant1\DataStructures\BloomFilter\Benchmark\Stopwatch;
use Avant1\DataStructures\BloomFilter\Benchmark\StorageBenchmark;
use Avant1\DataStructures\BloomFilter\Storage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StorageBenchmarkSpec extends ObjectBehavior
{
    function let(Stopwatch $stopwatch)
    {
        $this->beConstructedWith($stopwatch);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StorageBenchmark::class);
    }

    function it_can_run_items_store_benchmark(Stopwatch $stopwatch, Storage $storage)
    {
        $stopwatch->measure(Argument::type('callable'))->willReturn(0.5);

        $this->storeItems(10, $storage)->shouldReturnAnInstanceOf(BenchmarkResult::class);
    }

}

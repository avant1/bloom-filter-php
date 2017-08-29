<?php

namespace spec\Avant1\DataStructures\BloomFilter\Benchmark;

use Avant1\DataStructures\BloomFilter\Benchmark\Stopwatch;
use Avant1\DataStructures\BloomFilter\Storage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StopwatchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Stopwatch::class);
    }

    function it_runs_passed_code_and_returns_runtime(Storage $storage)
    {
        $unwrappedStorage = $storage->getWrappedObject();
        $callback = function() use ($unwrappedStorage) {
            $unwrappedStorage->set(555);
        };

        $storage->set(555)->shouldBeCalled();

        $this->measure($callback)->shouldBeFloat();
    }

}

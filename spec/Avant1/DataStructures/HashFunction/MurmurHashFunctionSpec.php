<?php

namespace spec\Avant1\DataStructures\HashFunction;

use Avant1\DataStructures\HashFunction\MurmurHashFunction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MurmurHashFunctionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MurmurHashFunction::class);
    }

    function it_should_hash()
    {
        $this->hash('potato')->shouldReturn(3848297315);
    }

}

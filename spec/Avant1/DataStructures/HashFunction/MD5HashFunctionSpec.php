<?php

namespace spec\Avant1\DataStructures\HashFunction;

use Avant1\DataStructures\HashFunction\MD5HashFunction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MD5HashFunctionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MD5HashFunction::class);
    }

    function it_should_hash()
    {
        $this->hash('potato')->shouldReturn('8ee2027983915ec78acc45027d874316');
    }

}

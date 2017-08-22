<?php

namespace spec\Avant1\DataStructures\BloomFilter;

use Avant1\DataStructures\BloomFilter;
use Avant1\DataStructures\BloomFilter\SimpleBloomFilter;
use Avant1\DataStructures\HashFunction\MurmurHashFunction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SimpleBloomFilterSpec extends ObjectBehavior
{

    private $m = 100;

    function let()
    {
        $this->beConstructedWith($this->m, ...[new MurmurHashFunction()]);
    }

    function it_should_be_bloom_filter()
    {
        $this->shouldHaveType(SimpleBloomFilter::class);
        $this->shouldHaveType(BloomFilter::class);
    }

    function it_is_empty_by_default()
    {
        $this->exists('banana')->shouldReturn(false);
    }

    function it_can_store_item_and_allow_to_check_if_it_was_stored_previously()
    {
        $this->add('banana');

        $this->exists('banana')->shouldReturn(true);
    }

    function it_has_collisions()
    {
        $this->beConstructedWith($m = 10, ...[new MurmurHashFunction()]);

        $this->add('banana');
        $this->add('potato');
        $this->add('carrot');

        $this->exists('tomato!')->shouldReturn(true);
    }


}

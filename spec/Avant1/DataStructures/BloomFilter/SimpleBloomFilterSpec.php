<?php

namespace spec\Avant1\DataStructures\BloomFilter;

use Avant1\DataStructures\BloomFilter;
use Avant1\DataStructures\BloomFilter\SimpleBloomFilter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SimpleBloomFilterSpec extends ObjectBehavior
{
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


}

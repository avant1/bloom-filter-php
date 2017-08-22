<?php

namespace spec\Avant1\DataStructures\BloomFilter\Storage;

use Avant1\DataStructures\BloomFilter\Storage;
use Avant1\DataStructures\BloomFilter\Storage\ArrayStorage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayStorageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ArrayStorage::class);
        $this->shouldHaveType(Storage::class);
    }

    function it_is_empty_by_default()
    {
        $this->get(111)->shouldReturn(false);
    }

    function it_can_be_checked_after_set()
    {
        $this->set(111);

        $this->get(111)->shouldReturn(true);
    }

    function it_sets_only_given_offset_but_not_others()
    {
        $this->set(111);

        $this->get(222)->shouldReturn(false);
    }

}

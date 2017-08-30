<?php

namespace spec\Avant1\DataStructures\BloomFilter\Storage;

use Avant1\DataStructures\BloomFilter\Storage\StringStorage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringStorageSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(1000);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StringStorage::class);
    }

    function it_is_empty_by_default()
    {
        $this->get(100)->shouldReturn(false);
        $this->get(555)->shouldReturn(false);
    }

    function it_saves_previously_set_value()
    {
        $this->set(10);

        $this->get(10)->shouldReturn(true);
    }

    function it_allows_multiple_subsequent_sets_with_same_offset()
    {
        $this->set(10);
        $this->set(10);

        $this->get(10)->shouldReturn(true);
    }

}

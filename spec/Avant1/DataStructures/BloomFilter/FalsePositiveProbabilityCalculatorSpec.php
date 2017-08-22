<?php

namespace spec\Avant1\DataStructures\BloomFilter;

use Avant1\DataStructures\BloomFilter\FalsePositiveProbabilityCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FalsePositiveProbabilityCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FalsePositiveProbabilityCalculator::class);
    }

    function it_can_calculate_false_positive_probability()
    {
        $numberOfItems = 1000 * 1000 * 1000; //1kkk
        $numberOfBits = 1000 * 1000 * 1000 * 8;//1 GB
        $numberOfHashFunctions = 4;

        $this->calculateFalsePositiveProbability($numberOfItems, $numberOfBits, $numberOfHashFunctions)->shouldBeApproximately(0.024, 0.001);
    }

}

<?php

declare(strict_types=1);

namespace Avant1\DataStructures\BloomFilter;


class FalsePositiveProbabilityCalculator
{

    public function calculateFalsePositiveProbability(int $numberOfStoredItems, int $sizeOfBitsArray, int $numberOfHashFunctions): float
    {
        //https://en.wikipedia.org/wiki/Bloom_filter#Probability_of_false_positives
        $power = $numberOfStoredItems * $numberOfHashFunctions * -1 / $sizeOfBitsArray;
        $result = (1 - exp($power)) ** $numberOfHashFunctions;

        return (float)$result;
    }

}

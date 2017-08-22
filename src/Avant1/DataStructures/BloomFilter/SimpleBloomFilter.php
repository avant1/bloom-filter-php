<?php

namespace Avant1\DataStructures\BloomFilter;

use Avant1\DataStructures\BloomFilter;
use Avant1\DataStructures\HashFunction;

class SimpleBloomFilter implements BloomFilter
{

    private $hash;

    private $m;
    private $hashFunctions;

    public function __construct(int $m, HashFunction ...$hashFunctions)
    {
        $this->m = $m;
        $this->hashFunctions = $hashFunctions;

        $this->hash = new \SplFixedArray($m);
    }

    public function exists(string $id): bool
    {
        foreach ($this->hashFunctions as $function) {
            $index = $this->getIndex($id, $function);
            if (!isset($this->hash[$index])) {
                return false;
            }
        }

        return true;
    }

    public function add(string $id): void
    {
        foreach ($this->hashFunctions as $function) {
            $index = $this->getIndex($id, $function);
            $this->hash[$index] = true;
        }
    }

    private function getIndex(string $id, HashFunction $function): int
    {
        $index = $function->hash($id);
        $index = $index % $this->m;

        return $index;
    }
}

![build-status](https://travis-ci.org/avant1/bloom-filter-php.svg?branch=master "Build status")

PHP implementation of Bloom filter

Hash table can be stored in any class that implements `Avant1\DataStructures\BloomFilter\Storage` interface.

There are several predefined storages:
- ArrayStorage 
- SPLFixedArrayStorage

There are benchmarks for storages. Benchmark run examples: 
```bash
bin/cli benchmark ArrayStorage 1000000
bin/cli benchmark SPLFixedArrayStorage 1000000
```

<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call;

use ArrayIterator;
use Iterator;

/**
 * Aggregates multiple call results into a collection and provides an informational API on top of that.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class CallResults implements Results
{
    /**
     * @var Result[]
     */
    private $results;

    /**
     * Initializes call results collection.
     *
     * @param Result[] $results
     */
    public function __construct(array $results = array())
    {
        $this->results = $results;
    }

    /**
     * Merges results from provided collection into the current one.
     *
     * @param Results $first
     * @param Results $second
     *
     * @return Results
     */
    public static function merge(Results $first, Results $second)
    {
        return new static(array_merge($first->toArray(), $second->toArray()));
    }

    /**
     * Checks if any call in collection throws an exception.
     *
     * @return bool
     */
    public function hasExceptions()
    {
        foreach ($this->results as $result) {
            if ($result->hasException()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if any call in collection produces an output.
     *
     * @return bool
     */
    public function hasStdOuts()
    {
        foreach ($this->results as $result) {
            if ($result->hasStdOut()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns amount of results.
     *
     * @return integer
     */
    public function count()
    {
        return count($this->results);
    }

    /**
     * Returns collection iterator.
     *
     * @return Iterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->results);
    }

    /**
     * Returns call results array.
     *
     * @return Result[]
     */
    public function toArray()
    {
        return $this->results;
    }
}

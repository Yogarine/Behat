<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call\Filter;

use Behat\Testwork\Call\Caller;
use Behat\Testwork\Call\Result;

/**
 * Filters call results and produces new ones.
 *
 * @see Caller
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface ResultFilter
{
    /**
     * Checks if filter supports call result.
     *
     * @param Result $result
     *
     * @return bool
     */
    public function supportsResult(Result $result);

    /**
     * Filters call result and returns a new result.
     *
     * @param Result $result
     *
     * @return Result
     */
    public function filterResult(Result $result);
}

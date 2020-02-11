<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call;

use Countable;
use IteratorAggregate;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface Results extends Countable, IteratorAggregate
{
    /**
     * Merges results from provided collection into the current one.
     *
     * @param Results $first
     * @param Results $second
     *
     * @return Results
     */
    public static function merge(Results $first, Results $second);

    /**
     * Checks if any call in collection throws an exception.
     *
     * @return bool
     */
    public function hasExceptions();

    /**
     * Checks if any call in collection produces an output.
     *
     * @return bool
     */
    public function hasStdOuts();
}

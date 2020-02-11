<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Statistics;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface CallStat extends Stat
{
    /**
     * Returns hook name.
     *
     * @return string
     */
    public function getName();

    /**
     * Checks if hook was successful.
     *
     * @return bool
     */
    public function isSuccessful();

    /**
     * Returns hook standard output (if has some).
     *
     * @return string|null
     */
    public function getStdOut();

    /**
     * Returns hook exception.
     *
     * @return string|null
     */
    public function getError();
}

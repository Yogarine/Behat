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
interface ResultStat extends Stat
{
    /**
     * Returns scenario title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Returns scenario result code.
     *
     * @return integer
     */
    public function getResultCode();
}
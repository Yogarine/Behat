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
interface ScenarioStepStat extends Stat
{
    /**
     * Returns associated scenario text.
     *
     * @return string
     */
    public function getScenarioText();

    /**
     * Returns associated scenario path.
     *
     * @return string
     */
    public function getScenarioPath();

    /**
     * Returns step text.
     *
     * @return string
     */
    public function getStepText();

    /**
     * Returns step path.
     *
     * @return string
     */
    public function getStepPath();

    /**
     * Returns step result code.
     *
     * @return integer
     */
    public function getResultCode();

    /**
     * Returns step error (if has one).
     *
     * @return null|string
     */
    public function getError();

    /**
     * Returns step output (if has one).
     *
     * @return null|string
     */
    public function getStdOut();

    /**
     * Returns string representation for a stat.
     *
     * @return string
     */
    public function __toString();
}

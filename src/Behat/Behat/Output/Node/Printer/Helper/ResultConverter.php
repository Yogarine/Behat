<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\Printer\Helper;

use Behat\Testwork\Tester\Result\TestResult;

/**
 * Converts TestResult objects into a string representation.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ResultConverter
{
    /**
     * Converts provided TestResult to a string.
     *
     * @param TestResult $result
     *
     * @return string
     */
    public function convertResultToString(TestResult $result);

    /**
     * Converts provided result code to a string.
     *
     * @param integer $resultCode
     *
     * @return string
     */
    public function convertResultCodeToString($resultCode);
}

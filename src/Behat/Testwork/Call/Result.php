<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call;

use Exception;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface Result
{
    /**
     * Returns call.
     *
     * @return Call
     */
    public function getCall();

    /**
     * Returns call return value.
     *
     * @return mixed
     */
    public function getReturn();

    /**
     * Check if call thrown exception.
     *
     * @return bool
     */
    public function hasException();

    /**
     * Returns exception thrown by call (if any).
     *
     * @return null|Exception
     */
    public function getException();

    /**
     * Checks if call produced stdOut.
     *
     * @return bool
     */
    public function hasStdOut();

    /**
     * Returns stdOut produced by call (if any).
     *
     * @return null|string
     */
    public function getStdOut();
}

<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call\Handler;

use Behat\Testwork\Call\Call;
use Behat\Testwork\Call\Caller;
use Behat\Testwork\Call\Result;

/**
 * Handles calls and produces call results.
 *
 * @see Caller
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface CallHandler
{
    /**
     * Checks if handler supports call.
     *
     * @param Call $call
     *
     * @return bool
     */
    public function supportsCall(Call $call);

    /**
     * Handles call and returns call result.
     *
     * @param Call $call
     *
     * @return Result
     */
    public function handleCall(Call $call);
}

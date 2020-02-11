<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Call;

use Behat\Testwork\Call\Filter\CallFilter;
use Behat\Testwork\Call\Filter\ResultFilter;
use Behat\Testwork\Call\Handler\CallHandler;
use Behat\Testwork\Call\Handler\ExceptionHandler;

/**
 * Makes calls and handles results using registered handlers.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface Caller
{
    /**
     * Registers call filter.
     *
     * @param CallFilter $filter
     */
    public function registerCallFilter(CallFilter $filter);

    /**
     * Registers call handler.
     *
     * @param CallHandler $handler
     */
    public function registerCallHandler(CallHandler $handler);

    /**
     * Registers call result filter.
     *
     * @param ResultFilter $filter
     */
    public function registerResultFilter(ResultFilter $filter);

    /**
     * Registers result exception handler.
     *
     * @param ExceptionHandler $handler
     */
    public function registerExceptionHandler(ExceptionHandler $handler);

    /**
     * Handles call and its result using registered filters and handlers.
     *
     * @param Call $call
     *
     * @return Result
     */
    public function makeCall(Call $call);
}

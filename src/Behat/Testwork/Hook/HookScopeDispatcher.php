<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook;

use Behat\Testwork\Call\Results;
use Behat\Testwork\Hook\Scope\HookScope;

/**
 * Represents dispatcher that dispatches registered hooks scopes for provided events.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface HookScopeDispatcher
{
    /**
     * Dispatches hooks for a specified event.
     *
     * @param HookScope $scope
     *
     * @return Results
     */
    public function dispatchScopeHooks(HookScope $scope);
}

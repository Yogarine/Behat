<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook;

use Behat\Testwork\Environment\Environment;
use Behat\Testwork\Hook\Scope\HookScope;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentHookRepository
{
    /**
     * Returns all available hooks for a specific environment.
     *
     * @param Environment $environment
     *
     * @return Hook[]
     */
    public function getEnvironmentHooks(Environment $environment);

    /**
     * Returns hooks for a specific event.
     *
     * @param HookScope $scope
     *
     * @return Hook[]
     */
    public function getScopeHooks(HookScope $scope);
}

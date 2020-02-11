<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook;

use Behat\Testwork\Call\Caller;
use Behat\Testwork\Call\Result;
use Behat\Testwork\Call\CallResults;
use Behat\Testwork\Hook\Call\HookCall;
use Behat\Testwork\Hook\Scope\HookScope;

/**
 * Dispatches registered hooks for provided events.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class HookDispatcher implements HookScopeDispatcher
{
    /**
     * @var EnvironmentHookRepository
     */
    private $repository;
    /**
     * @var Caller
     */
    private $callCenter;

    /**
     * Initializes hook dispatcher.
     *
     * @param EnvironmentHookRepository $repository
     * @param Caller                    $callCenter
     */
    public function __construct(EnvironmentHookRepository $repository, Caller $callCenter)
    {
        $this->repository = $repository;
        $this->callCenter = $callCenter;
    }

    /**
     * Dispatches hooks for a specified event.
     *
     * @param HookScope $scope
     *
     * @return CallResults
     */
    public function dispatchScopeHooks(HookScope $scope)
    {
        $results = array();
        foreach ($this->repository->getScopeHooks($scope) as $hook) {
            $results[] = $this->dispatchHook($scope, $hook);
        }

        return new CallResults($results);
    }

    /**
     * Dispatches single event hook.
     *
     * @param HookScope $scope
     * @param Hook      $hook
     *
     * @return Result
     */
    private function dispatchHook(HookScope $scope, Hook $hook)
    {
        return $this->callCenter->makeCall(new HookCall($scope, $hook));
    }
}

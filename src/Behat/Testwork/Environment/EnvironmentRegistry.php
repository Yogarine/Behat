<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Environment;

use Behat\Testwork\Call\Callee;
use Behat\Testwork\Environment\Exception\EnvironmentBuildException;
use Behat\Testwork\Environment\Exception\EnvironmentIsolationException;
use Behat\Testwork\Environment\Handler\EnvironmentHandler;
use Behat\Testwork\Environment\Reader\EnvironmentReader;
use Behat\Testwork\Suite\Suite;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentRegistry
{
    /**
     * Registers environment handler.
     *
     * @param EnvironmentHandler $handler
     */
    public function registerEnvironmentHandler(EnvironmentHandler $handler);

    /**
     * Registers environment reader.
     *
     * @param EnvironmentReader $reader
     */
    public function registerEnvironmentReader(EnvironmentReader $reader);

    /**
     * Builds new environment for provided test suite.
     *
     * @param Suite $suite
     *
     * @return Environment
     *
     * @throws EnvironmentBuildException
     */
    public function buildEnvironment(Suite $suite);

    /**
     * Creates new isolated test environment using built one.
     *
     * @param Environment $environment
     * @param mixed       $testSubject
     *
     * @return Environment
     *
     * @throws EnvironmentIsolationException If appropriate environment handler is not found
     */
    public function isolateEnvironment(Environment $environment, $testSubject = null);

    /**
     * Reads all callees from environment using registered environment readers.
     *
     * @param Environment $environment
     *
     * @return Callee[]
     */
    public function readEnvironmentCallees(Environment $environment);
}

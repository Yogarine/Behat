<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Environment;

use Behat\Behat\Context\Exception\ContextNotFoundException;
use Behat\Behat\Context\Exception\WrongContextClassException;

/**
 * Represents test environment based on a collection of context instances.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ContextClassEnvironment extends ContextEnvironment
{
    /**
     * Registers context class.
     *
     * @param string     $contextClass
     * @param null|array $arguments
     *
     * @throws ContextNotFoundException   If class does not exist
     * @throws WrongContextClassException if class does not implement Context interface
     */
    public function registerContextClass($contextClass, array $arguments = null);

    /**
     * Returns context classes with their arguments.
     *
     * @return array[]
     */
    public function getContextClassesWithArguments();
}

<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Environment;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Exception\ContextNotFoundException;

/**
 * Represents test environment based on a collection of context instances.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ContextInstanceEnvironment extends ContextEnvironment
{
    /**
     * Registers context instance in the environment.
     *
     * @param Context $context
     */
    public function registerContext(Context $context);

    /**
     * Returns list of registered context instances.
     *
     * @return Context[]
     */
    public function getContexts();

    /**
     * Returns registered context by its class name.
     *
     * @param string $class
     *
     * @return Context
     *
     * @throws ContextNotFoundException If context is not in the environment
     */
    public function getContext($class);
}

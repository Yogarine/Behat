<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context;

use Behat\Behat\Context\Argument\ArgumentResolver;

/**
 * Instantiates contexts.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SimpleContextFactory
{
    /**
     * Creates and initializes context class.
     *
     * @param string             $class
     * @param array              $arguments
     * @param ArgumentResolver[] $singleUseResolvers
     *
     * @return Context
     */
    public function createContext($class, array $arguments = array(), array $singleUseResolvers = array());
}

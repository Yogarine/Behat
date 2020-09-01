<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Argument;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ArgumentResolverFactoryRegistry
{
    /**
     * Registers factory.
     *
     * @param ArgumentResolverFactory $factory
     */
    public function registerFactory(ArgumentResolverFactory $factory);
}

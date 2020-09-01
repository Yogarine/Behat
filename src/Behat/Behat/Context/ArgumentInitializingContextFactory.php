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
use Behat\Behat\Context\Initializer\ContextInitializer;

/**
 * Instantiates contexts.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ArgumentInitializingContextFactory extendS SimpleContextFactory
{
    /**
     * Registers context argument resolver.
     *
     * @param ArgumentResolver $resolver
     */
    public function registerArgumentResolver(ArgumentResolver $resolver);

    /**
     * Registers context initializer.
     *
     * @param ContextInitializer $initializer
     */
    public function registerContextInitializer(ContextInitializer $initializer);

}

<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\ServiceContainer;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface TaggedServiceProcessor
{
    /**
     * Finds and sorts (by priority) service references by provided tag.
     *
     * @param ContainerBuilder $container
     * @param string           $tag
     *
     * @return Reference[]
     */
    public function findAndSortTaggedServices(ContainerBuilder $container, $tag);

    /**
     * Processes wrappers of a service, found by provided tag.
     *
     * The wrappers are applied by descending priority.
     * The first argument of the wrapper service receives the inner service.
     *
     * @param ContainerBuilder $container
     * @param string           $target     The id of the service being decorated
     * @param string           $wrapperTag The tag used by wrappers
     */
    public function processWrapperServices(ContainerBuilder $container, $target, $wrapperTag);
}

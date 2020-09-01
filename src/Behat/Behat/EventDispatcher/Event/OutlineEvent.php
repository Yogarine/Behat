<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\EventDispatcher\Event;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\OutlineNode;
use Behat\Testwork\EventDispatcher\Event\LifecycleReference;

/**
 * Represents an outline event.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface OutlineEvent extends LifecycleReference
{
    /**
     * Returns feature.
     *
     * @return FeatureNode
     */
    public function getFeature();

    /**
     * Returns outline node.
     *
     * @return OutlineNode
     */
    public function getOutline();
}

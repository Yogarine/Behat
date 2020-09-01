<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\EventDispatcher\Event;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioLikeInterface;
use Behat\Testwork\EventDispatcher\Event\LifecycleReference;

/**
 * Represents an event of scenario-like structure (Scenario, Background, Example).
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ScenarioEvent extends LifecycleReference
{
    /**
     * Returns feature node.
     *
     * @return FeatureNode
     */
    public function getFeature();

    /**
     * Returns scenario node.
     *
     * @return ScenarioLikeInterface
     */
    public function getScenario();
}

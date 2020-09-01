<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\EventDispatcher\Event;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioLikeInterface;

/**
 * Represents an event of scenario-like structure (Scenario, Background, Example).
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface ScenarioLikeTested extends ScenarioEvent, GherkinNodeTested
{
}

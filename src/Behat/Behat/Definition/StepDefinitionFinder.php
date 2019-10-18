<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\StepNode;
use Behat\Testwork\Environment\Environment;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface StepDefinitionFinder
{
    /**
     * Searches definition for a provided step in a provided environment.
     *
     * @param Environment $environment
     * @param FeatureNode $feature
     * @param StepNode    $step
     *
     * @return DefinitionMatch
     */
    public function findDefinition(Environment $environment, FeatureNode $feature, StepNode $step);
}
<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Call;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\StepNode;
use Behat\Testwork\Call\Call;
use Behat\Testwork\Environment\Environment;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface FeatureStepCall extends Call
{
    /**
     * Returns environment this call is executed from.
     *
     * @return Environment
     */
    public function getEnvironment();

    /**
     * Returns step feature node.
     *
     * @return FeatureNode
     */
    public function getFeature();

    /**
     * Returns definition step node.
     *
     * @return StepNode
     */
    public function getStep();
}
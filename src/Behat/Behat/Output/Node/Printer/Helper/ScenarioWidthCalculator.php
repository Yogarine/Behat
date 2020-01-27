<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\Printer\Helper;

use Behat\Gherkin\Node\ExampleNode;
use Behat\Gherkin\Node\ScenarioLikeInterface as Scenario;
use Behat\Gherkin\Node\StepNode;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ScenarioWidthCalculator
{
    /**
     * Calculates scenario width.
     *
     * @param Scenario $scenario
     * @param integer  $indentation
     * @param integer  $subIndentation
     *
     * @return integer
     */
    public function calculateScenarioWidth(Scenario $scenario, $indentation, $subIndentation);

    /**
     * Calculates outline examples width.
     *
     * @param ExampleNode $example
     * @param integer     $indentation
     * @param integer     $subIndentation
     *
     * @return integer
     */
    public function calculateExampleWidth(ExampleNode $example, $indentation, $subIndentation);

    /**
     * Calculates scenario header width.
     *
     * @param Scenario $scenario
     * @param integer  $indentation
     *
     * @return integer
     */
    public function calculateScenarioHeaderWidth(Scenario $scenario, $indentation);

    /**
     * Calculates step width.
     *
     * @param StepNode $step
     * @param integer  $indentation
     *
     * @return integer
     */
    public function calculateStepWidth(StepNode $step, $indentation);
}

<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\Printer;

use Behat\Behat\Tester\Result\StepResult;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioLikeInterface;
use Behat\Gherkin\Node\StepNode;
use Behat\Testwork\Output\Formatter;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface PathPrinter
{
    /**
     * Prints scenario path comment.
     *
     * @param Formatter   $formatter
     * @param FeatureNode $feature
     * @param ScenarioLikeInterface $scenario
     * @param integer     $indentation
     */
    public function printScenarioPath(
        Formatter $formatter,
        FeatureNode $feature,
        ScenarioLikeInterface $scenario,
        $indentation
    );

    /**
     * Prints step path comment.
     *
     * @param Formatter  $formatter
     * @param ScenarioLikeInterface   $scenario
     * @param StepNode   $step
     * @param StepResult $result
     * @param integer    $indentation
     */
    public function printStepPath(
        Formatter $formatter,
        ScenarioLikeInterface $scenario,
        StepNode $step,
        StepResult $result,
        $indentation
    );
}

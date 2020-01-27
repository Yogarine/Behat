<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\Printer;

use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioLikeInterface;
use Behat\Testwork\Output\Formatter;
use Behat\Testwork\Tester\Result\TestResult;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ScenarioOpenTagPrinter
{
    /**
     * @param Formatter             $formatter
     * @param FeatureNode           $feature
     * @param ScenarioLikeInterface $scenario
     * @param TestResult            $result
     */
    public function printOpenTag(Formatter $formatter, FeatureNode $feature, ScenarioLikeInterface $scenario, TestResult $result);
}

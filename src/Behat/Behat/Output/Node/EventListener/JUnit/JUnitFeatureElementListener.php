<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener\JUnit;

use Behat\Behat\EventDispatcher\Event\AfterFeatureTestedEvent;
use Behat\Behat\EventDispatcher\Event\AfterScenarioLikeTested;
use Behat\Behat\EventDispatcher\Event\AfterStepSetupWithOutput;
use Behat\Behat\EventDispatcher\Event\AfterStepTestedWithOutput;
use Behat\Behat\EventDispatcher\Event\BeforeFeatureTested;
use Behat\Behat\EventDispatcher\Event\ScenarioTested;
use Behat\Behat\EventDispatcher\Event\StepEvent;
use Behat\Behat\EventDispatcher\Event\StepTested;
use Behat\Behat\Output\Node\EventListener\FeatureElementListener;
use Behat\Behat\Output\Node\Printer\FeaturePrinter;
use Behat\Behat\Output\Node\Printer\ScenarioOpenTagPrinter;
use Behat\Behat\Output\Node\Printer\SetupPrinter;
use Behat\Behat\Output\Node\Printer\StepPrinter;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Testwork\Event\Event;
use Behat\Testwork\Output\Formatter;

/**
 * Listens to feature, scenario and step events and calls appropriate printers.
 *
 * @author Wouter J <wouter@wouterj.nl>
 */
final class JUnitFeatureElementListener implements FeatureElementListener
{
    /**
     * @var FeaturePrinter
     */
    private $featurePrinter;
    /**
     * @var ScenarioOpenTagPrinter
     */
    private $scenarioPrinter;
    /**
     * @var StepPrinter
     */
    private $stepPrinter;
    /**
     * @var SetupPrinter
     */
    private $setupPrinter;
    /**
     * @var FeatureNode
     */
    private $beforeFeatureTestedEvent;
    /**
     * @var AfterScenarioLikeTested[]
     */
    private $afterScenarioTestedEvents = array();
    /**
     * @var AfterStepTestedWithOutput[]
     */
    private $afterStepTestedEvents = array();
    /**
     * @var AfterStepSetupWithOutput[]
     */
    private $afterStepSetupEvents = array();

    /**
     * Initializes listener.
     *
     * @param FeaturePrinter $featurePrinter
     * @param ScenarioOpenTagPrinter $scenarioPrinter
     * @param StepPrinter $stepPrinter
     * @param SetupPrinter $setupPrinter
     */
    public function __construct(FeaturePrinter $featurePrinter,
                                ScenarioOpenTagPrinter $scenarioPrinter,
                                StepPrinter $stepPrinter,
                                SetupPrinter $setupPrinter)
    {
        $this->featurePrinter = $featurePrinter;
        $this->scenarioPrinter = $scenarioPrinter;
        $this->stepPrinter = $stepPrinter;
        $this->setupPrinter = $setupPrinter;
    }

    /**
     * {@inheritdoc}
     */
    public function listenEvent(Formatter $formatter, Event $event, $eventName)
    {
        if ($event instanceof ScenarioTested) {
            $this->captureScenarioEvent($event);
        }

        if ($event instanceof StepTested
            || $event instanceof AfterStepSetupWithOutput
        ) {
            $this->captureStepEvent($event);
        }

        $this->captureFeatureOnBeforeEvent($event);
        $this->printFeatureOnAfterEvent($formatter, $event);
    }

    /**
     * Captures scenario tested event.
     *
     * @param ScenarioTested $event
     */
    private function captureScenarioEvent(ScenarioTested $event)
    {
        if ($event instanceof AfterScenarioLikeTested) {
            $this->afterScenarioTestedEvents[$event->getScenario()->getLine()] = array(
                'event'             => $event,
                'step_events'       => $this->afterStepTestedEvents,
                'step_setup_events' => $this->afterStepSetupEvents,
            );

            $this->afterStepTestedEvents = array();
            $this->afterStepSetupEvents = array();
        }
    }

    /**
     * Captures feature on BEFORE event.
     *
     * @param Event $event
     */
    private function captureFeatureOnBeforeEvent(Event $event)
    {
        if (!$event instanceof BeforeFeatureTested) {
            return;
        }

        $this->beforeFeatureTestedEvent = $event->getFeature();
    }

    /**
     * Captures step tested event.
     *
     * @param StepEvent $event
     */
    private function captureStepEvent(StepEvent $event)
    {
        if ($event instanceof AfterStepTestedWithOutput) {
            $this->afterStepTestedEvents[$event->getStep()->getLine()] = $event;
        }
        if ($event instanceof AfterStepSetupWithOutput) {
            $this->afterStepSetupEvents[$event->getStep()->getLine()] = $event;
        }
    }

    /**
     * Prints the feature on AFTER event.
     *
     * @param Formatter $formatter
     * @param Event     $event
     */
    public function printFeatureOnAfterEvent(Formatter $formatter, Event $event)
    {
        if (!$event instanceof AfterFeatureTestedEvent) {
            return;
        }

        $this->featurePrinter->printHeader($formatter, $this->beforeFeatureTestedEvent);

        foreach ($this->afterScenarioTestedEvents as $afterScenario) {
            $afterScenarioTested = $afterScenario['event'];
            $this->scenarioPrinter->printOpenTag($formatter, $afterScenarioTested->getFeature(), $afterScenarioTested->getScenario(), $afterScenarioTested->getTestResult());

            /** @var AfterStepSetupWithOutput $afterStepSetup */
            foreach ($afterScenario['step_setup_events'] as $afterStepSetup) {
                $this->setupPrinter->printSetup($formatter, $afterStepSetup->getSetup());
            }
            foreach ($afterScenario['step_events'] as $afterStepTested) {
                $this->stepPrinter->printStep($formatter, $afterScenarioTested->getScenario(), $afterStepTested->getStep(), $afterStepTested->getTestResult());
                $this->setupPrinter->printTeardown($formatter, $afterStepTested->getTeardown());
            }
        }

        $this->featurePrinter->printFooter($formatter, $event->getTestResult());
        $this->afterScenarioTestedEvents = array();
    }
}

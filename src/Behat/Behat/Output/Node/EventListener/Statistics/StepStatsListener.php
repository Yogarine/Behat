<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener\Statistics;

use Behat\Behat\EventDispatcher\Event\BeforeScenarioTested;
use Behat\Behat\EventDispatcher\Event\FeatureTested;
use Behat\Behat\EventDispatcher\Event\ScenarioTested;
use Behat\Behat\EventDispatcher\Event\StepTested;
use Behat\Behat\Output\Statistics\StepStatV2;
use Behat\Behat\Output\Statistics\Statistics;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Tester\Result\DefinedStepResult;
use Behat\Behat\Tester\Result\ExecutedStepResult;
use Behat\Testwork\Event\Event;
use Behat\Testwork\EventDispatcher\Event\AfterTested;
use Behat\Testwork\Exception\ExceptionStringerPresenter;
use Behat\Testwork\Output\Formatter;
use Behat\Testwork\Output\Node\EventListener\EventListener;
use Behat\Testwork\Tester\Result\ExceptionResult;
use Behat\Testwork\Tester\Result\TestResult;
use Exception;

/**
 * Listens and records step events to statistics.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class StepStatsListener implements EventListener
{
    /**
     * @var Statistics
     */
    private $statistics;
    /**
     * @var string
     */
    private $currentFeaturePath;
    /**
     * @var ExceptionStringerPresenter
     */
    private $exceptionPresenter;
    /**
     * @var string
     */
    private $scenarioTitle;
    /**
     * @var string
     */
    private $scenarioPath;

    /**
     * Initializes listener.
     *
     * @param Statistics                 $statistics
     * @param ExceptionStringerPresenter $exceptionPresenter
     */
    public function __construct(Statistics $statistics, ExceptionStringerPresenter $exceptionPresenter)
    {
        $this->statistics = $statistics;
        $this->exceptionPresenter = $exceptionPresenter;
    }

    /**
     * {@inheritdoc}
     */
    public function listenEvent(Formatter $formatter, Event $event, $eventName)
    {
        $this->captureCurrentFeaturePathOnBeforeFeatureEvent($event);
        $this->forgetCurrentFeaturePathOnAfterFeatureEvent($eventName);
        $this->captureScenarioOnBeforeFeatureEvent($event);
        $this->forgetScenarioOnAfterFeatureEvent($eventName);
        $this->captureStepStatsOnAfterEvent($event);
    }

    /**
     * Captures current feature file path to the ivar on feature BEFORE event.
     *
     * @param Event $event
     */
    private function captureCurrentFeaturePathOnBeforeFeatureEvent(Event $event)
    {
        if (!$event instanceof FeatureTested) {
            return;
        }

        $this->currentFeaturePath = $event->getFeature()->getFile();
    }

    /**
     * Removes current feature file path from the ivar on feature AFTER event.
     *
     * @param string $eventName
     */
    private function forgetCurrentFeaturePathOnAfterFeatureEvent($eventName)
    {
        if (FeatureTested::AFTER !== $eventName) {
            return;
        }

        $this->currentFeaturePath = null;
    }

    /**
     * Captures current scenario title and path on scenario BEFORE event.
     *
     * @param Event $event
     */
    private function captureScenarioOnBeforeFeatureEvent(Event $event)
    {
        if (!$event instanceof BeforeScenarioTested) {
            return;
        }

        $this->scenarioTitle = sprintf('%s: %s', $event->getScenario()->getKeyword(), $event->getScenario()->getTitle());
        $this->scenarioPath = sprintf('%s:%s', $this->currentFeaturePath, $event->getScenario()->getLine());
    }

    private function forgetScenarioOnAfterFeatureEvent($eventName)
    {
        if (ScenarioTested::AFTER !== $eventName) {
            return;
        }

        $this->scenarioTitle = $this->scenarioPath = null;
    }

    /**
     * Captures step stats on step AFTER event.
     *
     * @param Event $event
     */
    private function captureStepStatsOnAfterEvent(Event $event)
    {
        if (!$event instanceof AfterTested || !$event instanceof StepTested) {
            return;
        }

        $result = $event->getTestResult();
        $step = $event->getStep();
        $text = sprintf('%s %s', $step->getKeyword(), $step->getText());
        $exception = $this->getStepException($result);

        $path = $this->getStepPath($event, $exception);
        $error = $exception ? $this->exceptionPresenter->presentException($exception) : null;
        $stdOut = $result instanceof ExecutedStepResult ? $result->getCallResult()->getStdOut() : null;

        $resultCode = $result->getResultCode();
        $stat = new StepStatV2($this->scenarioTitle, $this->scenarioPath, $text, $path, $resultCode, $error, $stdOut);

        $this->statistics->registerStepStat($stat);
    }

    /**
     * Gets exception from the step test results.
     *
     * @param TestResult $result
     *
     * @return null|Exception
     */
    private function getStepException(TestResult $result)
    {
        if ($result instanceof ExceptionResult) {
            return $result->getException();
        }

        return null;
    }

    /**
     * Gets step path from the AFTER test event and exception.
     *
     * @param StepTested $event
     * @param null|Exception         $exception
     *
     * @return string
     */
    private function getStepPath(StepTested $event, Exception $exception = null)
    {
        $path = sprintf('%s:%d', $this->currentFeaturePath, $event->getStep()->getLine());

        if ($exception && $exception instanceof PendingException && $event instanceof AfterTested) {
            $testResult = $event->getTestResult();

            if ($testResult instanceof DefinedStepResult) {
                $path = $testResult->getStepDefinition()->getPath();
            }
        }

        return $path;
    }
}

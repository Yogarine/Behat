<?php
namespace Behat\Behat\Output\Node\EventListener\JUnit;

use Behat\Behat\EventDispatcher\Event\AfterFeatureTested;
use Behat\Behat\EventDispatcher\Event\EnvironmentAfterTested;
use Behat\Behat\EventDispatcher\Event\BeforeFeatureTested;
use Behat\Behat\EventDispatcher\Event\BeforeScenarioTested;
use Behat\Behat\Output\Node\EventListener\FeatureDurationListener;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\KeywordNodeInterface;
use Behat\Gherkin\Node\ScenarioLikeInterface;
use Behat\Testwork\Counter\Timer;
use Behat\Testwork\Event\Event;
use Behat\Testwork\Output\Formatter;

final class JUnitDurationListener implements FeatureDurationListener
{
    /**
     * @var Timer[]
     */
    private $scenarioTimerStore = array();
    /**
     * @var Timer[]
     */
    private $featureTimerStore = array();
    /**
     * @var float[]
     */
    private $resultStore = array();
    /**
     * @var float[]
     */
    private $featureResultStore = array();

    /** @inheritdoc */
    public function listenEvent(Formatter $formatter, Event $event, $eventName)
    {
        $this->captureBeforeScenarioEvent($event);
        $this->captureBeforeFeatureTested($event);
        $this->captureAfterScenarioEvent($event);
        $this->captureAfterFeatureEvent($event);
    }

    /**
     * @param ScenarioLikeInterface $scenario
     * @return float|string
     */
    public function getDuration(ScenarioLikeInterface $scenario)
    {
        $key = $this->getHash($scenario);
        return array_key_exists($key, $this->resultStore) ? $this->resultStore[$key] : '';
    }

    /**
     * @param FeatureNode $feature
     * @return float|string
     */
    public function getFeatureDuration(FeatureNode $feature)
    {
        $key = $this->getHash($feature);
        return array_key_exists($key, $this->featureResultStore) ? $this->featureResultStore[$key] : '';
    }

    /**
     * @param Event $event
     */
    private function captureBeforeFeatureTested(Event $event)
    {
        if (!$event instanceof BeforeFeatureTested) {
            return;
        }

        $this->featureTimerStore[$this->getHash($event->getFeature())] = $this->startTimer();
    }

    /**
     * @param Event $event
     */
    private function captureBeforeScenarioEvent(Event $event)
    {
        if (!$event instanceof BeforeScenarioTested) {
            return;
        }

        $this->scenarioTimerStore[$this->getHash($event->getScenario())] = $this->startTimer();
    }

    /**
     * @param Event $event
     */
    private function captureAfterScenarioEvent(Event $event)
    {
        if (!$event instanceof EnvironmentAfterTested) {
            return;
        }

        $key = $this->getHash($event->getScenario());
        $timer = $this->scenarioTimerStore[$key];
        if ($timer instanceof Timer) {
            $timer->stop();
            $this->resultStore[$key] = round($timer->getTime());
        }
    }

    /**
     * @param Event $event
     */
    private function captureAfterFeatureEvent(Event $event)
    {
        if (!$event instanceof AfterFeatureTested) {
            return;
        }

        $key = $this->getHash($event->getFeature());
        $timer = $this->featureTimerStore[$key];
        if ($timer instanceof Timer) {
            $timer->stop();
            $this->featureResultStore[$key] = round($timer->getTime());
        }
    }

    /**
     * @param KeywordNodeInterface $node
     * @return string
     */
    private function getHash(KeywordNodeInterface $node)
    {
        return spl_object_hash($node);
    }

    /**
     * @return Timer
     */
    private function startTimer()
    {
        $timer = new Timer();
        $timer->start();

        return $timer;
    }
}

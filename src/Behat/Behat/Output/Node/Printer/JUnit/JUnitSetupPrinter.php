<?php
namespace Behat\Behat\Output\Node\Printer\JUnit;

use Behat\Behat\Hook\Scope\StepScope;
use Behat\Behat\Output\Node\Printer\SetupPrinter;
use Behat\Testwork\Call\Result;
use Behat\Testwork\Call\Results;
use Behat\Testwork\Exception\ExceptionStringerPresenter;
use Behat\Testwork\Hook\Call\HookCall;
use Behat\Testwork\Hook\Hooked;
use Behat\Testwork\Output\Formatter;
use Behat\Testwork\Output\Printer\JUnitOutputPrinter;
use Behat\Testwork\Tester\Setup\Setup;
use Behat\Testwork\Tester\Setup\Teardown;

/**
 * @author: Jakob Erdmann <jakob.erdmann@rocket-internet.com>
 */
class JUnitSetupPrinter implements SetupPrinter
{
    /**
     * @var ExceptionStringerPresenter
     */
    private $exceptionPresenter;

    /**
     * @param ExceptionStringerPresenter $exceptionPresenter
     */
    public function __construct(ExceptionStringerPresenter $exceptionPresenter)
    {
        $this->exceptionPresenter = $exceptionPresenter;
    }

    /**
     * {@inheritdoc}
     */
    public function printSetup(Formatter $formatter, Setup $setup)
    {
        if (!$setup->isSuccessful()) {
            if ($setup instanceof Hooked) {
                $this->handleHookCalls($formatter, $setup->getHookCallResults(), 'setup');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function printTeardown(Formatter $formatter, Teardown $teardown)
    {
        if (!$teardown->isSuccessful()) {
            if ($teardown instanceof Hooked) {
                $this->handleHookCalls($formatter, $teardown->getHookCallResults(), 'teardown');
            }
        }
    }

    /**
     * @param Formatter $formatter
     * @param Results $results
     * @param string $messageType
     */
    private function handleHookCalls(Formatter $formatter, Results $results, $messageType)
    {
        /** @var Result $hookCallResult */
        foreach ($results as $hookCallResult) {
            if ($hookCallResult->hasException()) {
                /** @var HookCall $call */
                $call = $hookCallResult->getCall();
                $scope = $call->getScope();
                /** @var JUnitOutputPrinter $outputPrinter */
                $outputPrinter = $formatter->getOutputPrinter();

                $message = '';
                if ($scope instanceof StepScope) {
                    $message .= $scope->getStep()->getKeyword() . ' ' . $scope->getStep()->getText() . ': ';
                }
                $message .= $this->exceptionPresenter->presentException($hookCallResult->getException());

                $attributes = array(
                    'message' => $message,
                    'type'    => $messageType,
                );

                $outputPrinter->addTestcaseChild('failure', $attributes);

            }
        }
    }
}

<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Transformation\Transformation;

use Behat\Behat\Definition\Call\FeatureStepCall;
use Behat\Behat\Transformation\Call\TransformationCall;
use Behat\Behat\Transformation\SimpleArgumentTransformation;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Call\CallCenter;
use Behat\Testwork\Call\RuntimeCallee;
use ReflectionMethod;

/**
 * Table row transformation.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class TableRowTransformation extends RuntimeCallee implements SimpleArgumentTransformation
{
    public const PATTERN_REGEX = '/^row\:[[:print:]]+$/';

    /**
     * @var string
     */
    private $pattern;

    /**
     * {@inheritdoc}
     */
    static public function supportsPatternAndMethod($pattern, ReflectionMethod $method)
    {
        return 1 === preg_match(self::PATTERN_REGEX, $pattern);
    }

    /**
     * Initializes transformation.
     *
     * @param string      $pattern
     * @param callable    $callable
     * @param null|string $description
     */
    public function __construct($pattern, $callable, $description = null)
    {
        $this->pattern = $pattern;

        parent::__construct($callable, $description);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDefinitionAndArgument(FeatureStepCall $definitionCall, $argumentIndex, $argumentValue)
    {
        if (!$argumentValue instanceof TableNode) {
            return false;
        };

        return $this->pattern === 'row:' . implode(',', $argumentValue->getRow(0));
    }

    /**
     * {@inheritdoc}
     */
    public function transformArgument(CallCenter $callCenter, FeatureStepCall $definitionCall, $argumentIndex, $argumentValue)
    {
        $rows = array();
        foreach ($argumentValue as $row) {
            $call = new TransformationCall(
                $definitionCall->getEnvironment(),
                $definitionCall->getCallee(),
                $this,
                array($row)
            );

            $result = $callCenter->makeCall($call);

            if ($result->hasException()) {
                throw $result->getException();
            }

            $rows[] = $result->getReturn();
        }

        return $rows;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 50;
    }

    /**
     * {@inheritdoc}
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return 'TableRowTransform ' . $this->pattern;
    }
}

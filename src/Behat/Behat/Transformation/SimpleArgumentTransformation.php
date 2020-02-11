<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Transformation;

use Behat\Behat\Definition\Call\FeatureStepCall;
use Behat\Testwork\Call\Caller;
use ReflectionMethod;

/**
 * Represents a simple self-contained transformation capable of changing a single argument.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface SimpleArgumentTransformation extends Transformation
{
    /**
     * Checks if transformation supports given pattern.
     *
     * @param string           $pattern
     * @param ReflectionMethod $method
     *
     * @return bool
     */
    static public function supportsPatternAndMethod($pattern, ReflectionMethod $method);

    /**
     * Returns transformation priority.
     *
     * @return integer
     */
    public function getPriority();

    /**
     * Checks if transformation supports argument.
     *
     * @param FeatureStepCall $definitionCall
     * @param integer|string $argumentIndex
     * @param mixed          $argumentValue
     *
     * @return bool
     */
    public function supportsDefinitionAndArgument(FeatureStepCall $definitionCall, $argumentIndex, $argumentValue);

    /**
     * Transforms argument value using transformation and returns a new one.
     *
     * @param Caller          $callCenter
     * @param FeatureStepCall $definitionCall
     * @param integer|string  $argumentIndex
     * @param mixed           $argumentValue
     *
     * @return mixed
     */
    public function transformArgument(Caller $callCenter, FeatureStepCall $definitionCall, $argumentIndex, $argumentValue);
}

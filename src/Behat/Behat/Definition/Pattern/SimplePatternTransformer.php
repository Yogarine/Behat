<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Pattern;

use Behat\Behat\Definition\Exception\UnknownPatternException;
use Behat\Behat\Definition\Exception\UnsupportedPatternTypeException;

/**
 * Transforms patterns.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SimplePatternTransformer
{
    /**
     * Generates pattern.
     *
     * @param string $type
     * @param string $stepText
     *
     * @return Pattern
     *
     * @throws UnsupportedPatternTypeException
     */
    public function generatePattern($type, $stepText);

    /**
     * Transforms pattern string to regex.
     *
     * @param string $pattern
     *
     * @return string
     *
     * @throws UnknownPatternException
     */
    public function transformPatternToRegex($pattern);
}

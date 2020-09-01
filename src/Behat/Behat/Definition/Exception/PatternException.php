<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Exception;

/**
 * Represents an exception thrown during step definition handling.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface PatternException extends DefinitionException
{
    /**
     * Returns pattern that caused exception.
     *
     * @return string
     */
    public function getPattern();
}

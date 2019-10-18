<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Exception;

use Throwable;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface PatternTypeException extends DefinitionException, Throwable
{
    /**
     * Returns pattern type that caused exception.
     *
     * @return string
     */
    public function getType();
}

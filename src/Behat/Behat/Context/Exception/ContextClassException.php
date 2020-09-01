<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Exception;

/**
 * Represents an exception thrown during context handling.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ContextClassException extends ContextException
{
    /**
     * Returns classname.
     *
     * @return string
     */
    public function getClass();
}

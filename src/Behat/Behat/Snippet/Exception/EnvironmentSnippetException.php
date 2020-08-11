<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Snippet\Exception;

use Behat\Testwork\Environment\Environment;

/**
 * All environment snippet exceptions should implement this interface.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentSnippetException extends SnippetException
{
    /**
     * Returns environment that caused exception.
     *
     * @return Environment
     */
    public function getEnvironment();
}

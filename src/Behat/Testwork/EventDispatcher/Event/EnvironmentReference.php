<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\EventDispatcher\Event;

use Behat\Testwork\Environment\Environment;
use Behat\Testwork\Suite\Suite;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentReference
{
    /**
     * Returns suite in which this event was fired.
     *
     * @return Suite
     */
    public function getSuite();

    /**
     * Returns environment in which this event was fired.
     *
     * @return Environment
     */
    public function getEnvironment();
}

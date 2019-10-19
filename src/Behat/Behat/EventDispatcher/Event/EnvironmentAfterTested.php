<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\EventDispatcher\Event;


use Behat\Testwork\EventDispatcher\Event\AfterTested;
use Behat\Testwork\EventDispatcher\Event\EnvironmentReference;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentAfterTested extends EnvironmentReference, AfterTested
{

}

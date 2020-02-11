<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener;

use Behat\Testwork\Event\Event;
use Behat\Testwork\Output\Formatter;
use Behat\Testwork\Output\Node\EventListener\EventListener;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface FeatureElementListener extends EventListener
{
    /**
     * Prints the feature on AFTER event.
     *
     * @param Formatter $formatter
     * @param Event     $event
     */
    public function printFeatureOnAfterEvent(Formatter $formatter, Event $event);
}

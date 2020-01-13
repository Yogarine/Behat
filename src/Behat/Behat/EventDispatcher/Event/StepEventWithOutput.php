<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\EventDispatcher\Event;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface StepEventWithOutput
{
    /**
     * Checks if step call, setup or teardown produced any output (stdOut or exception).
     *
     * @return bool
     */
    public function hasOutput();
}

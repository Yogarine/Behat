<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener;

use Behat\Gherkin\Node\ScenarioLikeInterface;
use Behat\Testwork\Output\Node\EventListener\EventListener;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface DurationListener extends EventListener
{
    /**
     * @param ScenarioLikeInterface $scenario
     * @return float|string
     */
    public function getDuration(ScenarioLikeInterface $scenario);
}

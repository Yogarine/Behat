<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener;

use Behat\Gherkin\Node\ExampleNode;
use Behat\Gherkin\Node\OutlineNode;
use Behat\Testwork\Output\Node\EventListener\EventListener;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface OutlineStoreListener extends EventListener
{
    /**
     * @param ExampleNode $scenario
     * @return OutlineNode
     */
    public function getCurrentOutline(ExampleNode $scenario);
}

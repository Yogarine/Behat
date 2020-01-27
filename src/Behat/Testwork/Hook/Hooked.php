<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook;

use Behat\Testwork\Call\CallResults;

/**
 * Represents a hookable test teardown.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface Hooked
{
    /**
     * Returns hook call results.
     *
     * @return CallResults
     */
    public function getHookCallResults();
}

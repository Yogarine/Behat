<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Pattern;

use Behat\Behat\Definition\Pattern\Policy\PatternPolicy;

/**
 * Transforms patterns.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface PatternPolicyTransformer extends SimplePatternTransformer
{
    /**
     * Registers pattern policy.
     *
     * @param PatternPolicy $policy
     */
    public function registerPatternPolicy(PatternPolicy $policy);
}

<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\EventListener;

use Behat\Gherkin\Node\FeatureNode;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface FeatureDurationListener extends DurationListener
{
    /**
     * @param FeatureNode $feature
     * @return float|string
     */
    public function getFeatureDuration(FeatureNode $feature);
}
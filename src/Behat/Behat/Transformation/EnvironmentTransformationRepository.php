<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Transformation;

use Behat\Testwork\Environment\Environment;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface EnvironmentTransformationRepository
{
    /**
     * Returns all available definitions for a specific environment.
     *
     * @param Environment $environment
     *
     * @return Transformation[]
     */
    public function getEnvironmentTransformations(Environment $environment);
}

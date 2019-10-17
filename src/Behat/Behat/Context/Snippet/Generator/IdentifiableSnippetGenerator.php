<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Snippet\Generator;

use Behat\Behat\Snippet\Generator\SnippetGenerator;

interface IdentifiableSnippetGenerator extends SnippetGenerator
{
    /**
     * Sets target context identifier.
     *
     * @param TargetContextIdentifier $identifier
     */
    public function setContextIdentifier(TargetContextIdentifier $identifier);

    /**
     * Sets target pattern type identifier.
     *
     * @param PatternIdentifier $identifier
     */
    public function setPatternIdentifier(PatternIdentifier $identifier);
}

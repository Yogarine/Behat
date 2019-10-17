<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Snippet;

use Behat\Gherkin\Node\StepNode;

/**
 * Aggregates multiple snippets with different targets and steps.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SimpleAggregateSnippet
{
    /**
     * Returns snippet type.
     *
     * @return string
     */
    public function getType();

    /**
     * Returns snippet unique ID (step type independent).
     *
     * @return string
     */
    public function getHash();

    /**
     * Returns definition snippet text.
     *
     * @return string
     */
    public function getSnippet();

    /**
     * Returns all steps interested in this snippet.
     *
     * @return StepNode[]
     */
    public function getSteps();

    /**
     * Returns all snippet targets.
     *
     * @return string[]
     */
    public function getTargets();

    /**
     * Returns the classes used in the snippet which should be imported.
     *
     * @return string[]
     */
    public function getUsedClasses();
}

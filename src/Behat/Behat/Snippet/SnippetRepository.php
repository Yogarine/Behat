<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Snippet;

use Behat\Behat\Snippet\Generator\SnippetGenerator;
use Behat\Gherkin\Node\StepNode;
use Behat\Testwork\Environment\Environment;

/**
 * Provides snippets.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface SnippetRepository
{
    /**
     * Registers snippet generator.
     *
     * @param SnippetGenerator $generator
     */
    public function registerSnippetGenerator(SnippetGenerator $generator);

    /**
     * Generates and registers snippet.
     *
     * @param Environment $environment
     * @param StepNode    $step
     *
     * @return null|Snippet
     */
    public function registerUndefinedStep(Environment $environment, StepNode $step);

    /**
     * Returns all generated snippets.
     *
     * @return SimpleAggregateSnippet[]
     */
    public function getSnippets();

    /**
     * Returns steps for which there was no snippet generated.
     *
     * @return UndefinedStep[]
     */
    public function getUndefinedSteps();
}

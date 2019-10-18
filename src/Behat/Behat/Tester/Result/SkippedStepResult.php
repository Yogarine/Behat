<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Tester\Result;

use Behat\Behat\Definition\DefinitionMatch;

/**
 * Represents a skipped step result.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class SkippedStepResult implements StepResult, DefinedStepResult
{
    /**
     * @var DefinitionMatch
     */
    private $searchResult;

    /**
     * Initializes step result.
     *
     * @param DefinitionMatch $searchResult
     */
    public function __construct(DefinitionMatch $searchResult)
    {
        $this->searchResult = $searchResult;
    }
    
    /**
     * Returns definition search result.
     *
     * @return DefinitionMatch
     */
    public function getSearchResult()
    {
        return $this->searchResult;
    }

    /**
     * {@inheritdoc}
     */
    public function getStepDefinition()
    {
        return $this->searchResult->getMatchedDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public function isPassed()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getResultCode()
    {
        return self::SKIPPED;
    }
}

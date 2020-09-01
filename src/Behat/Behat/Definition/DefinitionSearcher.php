<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition;

use Behat\Behat\Definition\Search\SearchEngine;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface DefinitionSearcher extends StepDefinitionFinder
{
    /**
     * Registers definition search engine.
     *
     * @param SearchEngine $searchEngine
     */
    public function registerSearchEngine(SearchEngine $searchEngine);
}

<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Printer;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SpecificDefinitionPrinter extends DefinitionPrinter
{
    /**
     * Sets search criterion.
     *
     * @param string $criterion
     */
    public function setSearchCriterion($criterion);
}

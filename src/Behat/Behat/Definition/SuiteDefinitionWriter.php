<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition;

use Behat\Behat\Definition\Printer\DefinitionPrinter;
use Behat\Testwork\Suite\Suite;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SuiteDefinitionWriter
{
    /**
     * Prints definitions for provided suite using printer.
     *
     * @param DefinitionPrinter $printer
     * @param Suite             $suite
     */
    public function printSuiteDefinitions(DefinitionPrinter $printer, $suite);
}

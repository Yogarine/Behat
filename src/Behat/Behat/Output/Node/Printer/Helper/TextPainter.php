<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Output\Node\Printer\Helper;

use Behat\Behat\Definition\Definition;
use Behat\Testwork\Tester\Result\TestResult;

/**
 * Paints text  according to found definition.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface TextPainter
{
    /**
     * Colorizes step text arguments according to definition.
     *
     * @param string     $text
     * @param Definition $definition
     * @param TestResult $result
     *
     * @return string
     */
    public function paintText($text, Definition $definition, TestResult $result);
}

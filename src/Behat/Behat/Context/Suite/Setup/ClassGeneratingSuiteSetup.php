<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Context\Suite\Setup;

use Behat\Behat\Context\ContextClass\ClassGenerator;
use Behat\Testwork\Suite\Setup\SuiteSetup;

/**
 * Generates classes in the suite.
 *
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ClassGeneratingSuiteSetup extends SuiteSetup
{
    /**
     * Registers class generator.
     *
     * @param ClassGenerator $generator
     */
    public function registerClassGenerator(ClassGenerator $generator);
}
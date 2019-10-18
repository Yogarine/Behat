<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition\Translator;

use Behat\Behat\Definition\Definition;
use Behat\Testwork\Suite\Suite;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface SuiteDefinitionTranslator
{
    /**
     * Attempts to translate definition using translator and produce translated one on success.
     *
     * @param Suite       $suite
     * @param Definition  $definition
     * @param null|string $language
     *
     * @return Definition|TranslatedDefinition
     */
    public function translateDefinition(Suite $suite, Definition $definition, $language = null);

    /**
     * @return string
     */
    public function getLocale();
}
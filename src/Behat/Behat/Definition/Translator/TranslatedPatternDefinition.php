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

/**
 * Represents a step definition.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface TranslatedPatternDefinition extends Definition
{
    /**
     * Returns original (not translated) pattern.
     *
     * @return string
     */
    public function getOriginalPattern();

    /**
     * Returns language definition was translated to.
     *
     * @return string
     */
    public function getLanguage();
}

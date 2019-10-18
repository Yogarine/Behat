<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\Definition;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface DefinitionMatch
{
    /**
     * Checks if result contains a match.
     *
     * @return bool
     */
    public function hasMatch();

    /**
     * Returns matched definition.
     *
     * @return null|Definition
     */
    public function getMatchedDefinition();

    /**
     * Returns matched text.
     *
     * @return null|string
     */
    public function getMatchedText();

    /**
     * Returns matched definition arguments.
     *
     * @return null|array
     */
    public function getMatchedArguments();
}
<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\ServiceContainer;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ExtensionActivationManager
{
    /**
     * Activate extension by its locator.
     *
     * @param string $locator phar file name, php file name, class name
     *
     * @return Extension
     */
    public function activateExtension($locator);

    /**
     * Returns specific extension by its name.
     *
     * @param string $key
     *
     * @return Extension
     */
    public function getExtension($key);

    /**
     * Returns all available extensions.
     *
     * @return Extension[]
     */
    public function getExtensions();

    /**
     * Returns activated extension names.
     *
     * @return array
     */
    public function getExtensionClasses();

    /**
     * Initializes all activated and predefined extensions.
     */
    public function initializeExtensions();

    /**
     * Returns array with extensions debug information.
     *
     * @return array
     */
    public function debugInformation();
}

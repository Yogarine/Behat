<?php

/*
 * This file is part of the Behat Testwork.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Exception;

use Behat\Testwork\Exception\Stringer\ExceptionStringer;
use Exception;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ExceptionStringerPresenter
{
    /**
     * Registers exception stringer.
     *
     * @param ExceptionStringer $stringer
     */
    public function registerExceptionStringer(ExceptionStringer $stringer);

    /**
     * Sets default verbosity to a specified level.
     *
     * @param integer $defaultVerbosity
     */
    public function setDefaultVerbosity($defaultVerbosity);

    /**
     * Presents exception as a string.
     *
     * @param Exception $exception
     * @param integer   $verbosity
     *
     * @return string
     */
    public function presentException(Exception $exception, $verbosity = null);
}

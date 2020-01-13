<?php

/*
 * This file is part of the Behat.
 * (c) Alwin Garside <alwin@garsi.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Behat\HelperContainer\Exception;

/**
 * @author Alwin Garside <alwin@garsi.de>
 */
interface ServiceException extends HelperContainerException
{
    /**
     * Returns service ID that caused exception.
     *
     * @return string
     */
    public function getServiceId();
}

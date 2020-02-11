<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Behat\Testwork\Hook\Tester\Setup;

use Behat\Testwork\Call\Results;
use Behat\Testwork\Hook\Hooked;
use Behat\Testwork\Tester\Setup\Setup;

/**
 * Represents hooked test setup.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class HookedSetup implements Hooked, Setup
{
    /**
     * @var Setup
     */
    private $setup;
    /**
     * @var Results
     */
    private $hookCallResults;

    /**
     * Initializes setup.
     *
     * @param Setup       $setup
     * @param Results $hookCallResults
     */
    public function __construct(Setup $setup, Results $hookCallResults)
    {
        $this->setup = $setup;
        $this->hookCallResults = $hookCallResults;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        if ($this->hookCallResults->hasExceptions()) {
            return false;
        }

        return $this->setup->isSuccessful();
    }

    /**
     * {@inheritdoc}
     */
    public function hasOutput()
    {
        return $this->hookCallResults->hasStdOuts() || $this->hookCallResults->hasExceptions();
    }

    /**
     * Returns hook call results.
     *
     * @return Results
     */
    public function getHookCallResults()
    {
        return $this->hookCallResults;
    }
}

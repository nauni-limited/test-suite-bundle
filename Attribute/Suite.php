<?php

/*
 * This file is part of the Nauni TestSuite bundle.
 *
 * (c) Tamas Dobo <tamas@nauni.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nauni\Bundle\NauniTestSuiteBundle\Attribute;

use Attribute;
use InvalidArgumentException;

/**
 * Attribute class for #[Suite()].
 *
 * @author Tamas Dobo <tamas@nauni.co.uk>
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Suite
{
    public function __construct(
        public string | array $suites
    ) {
        if (!is_array($this->suites)) {
            $this->suites = [$this->suites];
        }

        foreach ($this->suites as $suite) {
            if (!is_string($suite)) {
                throw new InvalidArgumentException('Suite can only be sting or flat array of strings');
            }
        }
    }

    public function getSuites(): array
    {
        return $this->suites;
    }
}
<?php

declare(strict_types=1);

namespace Helicon\DataMapper\Tests;

class Friend
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var self
     */
    private $child;
}

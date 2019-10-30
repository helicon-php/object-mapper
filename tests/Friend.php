<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper\Tests;

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
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var self
     */
    private $child;
}

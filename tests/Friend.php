<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper\Tests;

class Friend
{
    private int $id;
    private string $name;
    private \DateTime $createdAt;
    private self $child;
}

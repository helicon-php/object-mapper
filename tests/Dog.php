<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper\Tests;

class Dog
{
    private int $id;

    private string $name;

    private \DateTimeImmutable $createdAt;

    private self $child;
}

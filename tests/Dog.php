<?php


namespace Helicon\ObjectMapper\Tests;


class Dog
{
    private int $id;

    private string $name;

    private \DateTimeImmutable  $createdAt;

    private self $child;
}
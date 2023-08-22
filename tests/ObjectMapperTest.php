<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper\Tests;

use Helicon\ObjectMapper\ObjectMapperFactory;
use PHPUnit\Framework\TestCase;

final class ObjectMapperTest extends TestCase
{
    /**
     * @group 7.3
     */
    public function testMapping(): void
    {
        $data = [
            'id' => '1',
            'name' => 'polidog',
            'createdAt' => date('Y-m-d H:i:s'),
            'child' => [
                'id' => '3',
                'name' => 'yamada',
                'createdAt' => date('Y-m-d H:i:s'),
            ],
        ];
        $factory = (new ObjectMapperFactory());
        $mapper = $factory();
        $object = ($mapper)($data, Friend::class);
        $this->assertInstanceOf(Friend::class, $object);
    }

    /**
     * @group 7.4
     */
    public function testSupportedPHP74Mapping(): void
    {
        $data = [
            'id' => '1',
            'name' => 'polidog',
            'createdAt' => date('Y-m-d H:i:s'),
            'child' => [
                'id' => '3',
                'name' => 'hachi',
                'createdAt' => date('Y-m-d H:i:s'),
            ],
        ];
        $factory = (new ObjectMapperFactory());
        $mapper = $factory();
        $object = ($mapper)($data, Dog::class);
        $this->assertInstanceOf(Dog::class, $object);
    }
}

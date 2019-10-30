<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper\Tests;

use Helicon\DataMapper\ObjectMapper;
use Helicon\DataMapper\Tests\Friend;
use Helicon\ObjectTypeParser\Parser;
use Helicon\TypeConverter\Converter;
use Helicon\TypeConverter\Resolver;
use Helicon\TypeConverter\TypeCaster\ClassTypeCaster;
use Helicon\TypeConverter\TypeCaster\DateTimeCaster;
use Helicon\TypeConverter\TypeCaster\ScalarTypeCaster;
use PHPUnit\Framework\TestCase;
use Zend\Hydrator\ReflectionHydrator;

class ObjectMapperTest extends TestCase
{
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
        $mapper = $this->createMapper();
        $object = ($mapper)($data, Friend::class);
        $this->assertInstanceOf(Friend::class, $object);
    }

    private function createMapper(): ObjectMapper
    {
        $parser = new Parser();
        $resolver = new Resolver();
        $hydrator = new ReflectionHydrator();
        $resolver->addConverter(new ScalarTypeCaster());
        $resolver->addConverter(new DateTimeCaster());
        $resolver->addConverter(new DateTimeCaster());
        $resolver->addConverter(new ClassTypeCaster($resolver, $parser, $hydrator));


        $converter = new Converter($resolver);

        return new ObjectMapper($converter, $parser, $hydrator);
    }
}

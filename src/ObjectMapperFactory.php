<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper;

use Helicon\ObjectTypeParser\Parser;
use Helicon\ObjectTypeParser\ParserInterface;
use Helicon\TypeConverter\Converter;
use Helicon\TypeConverter\Resolver;
use Helicon\TypeConverter\TypeCaster\ClassTypeCaster;
use Helicon\TypeConverter\TypeCaster\DateTimeCaster;
use Helicon\TypeConverter\TypeCaster\ScalarTypeCaster;
use Laminas\Hydrator\ReflectionHydrator;

final class ObjectMapperFactory
{
    public function __invoke(ParserInterface $parser = null): ObjectMapper
    {
        if (null === $parser) {
            $parser = new Parser();
        }

        $resolver = new Resolver();
        $hydrator = new ReflectionHydrator();

        foreach ([
            ScalarTypeCaster::class,
            DateTimeCaster::class,
         ] as $typeCaster) {
            $resolver->addTypeCaster(new $typeCaster());
            $resolver->addTypeCaster(new $typeCaster());
        }

        $resolver->addTypeCaster(new ClassTypeCaster($resolver, $parser, $hydrator));
        $converter = new Converter($resolver);

        return new ObjectMapper($converter, $parser, $hydrator);
    }
}

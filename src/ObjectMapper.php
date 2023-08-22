<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper;

use Helicon\ObjectTypeParser\ParserInterface;
use Helicon\TypeConverter\ConverterInterface;
use Laminas\Hydrator\ReflectionHydrator;

final class ObjectMapper implements MapperInterface
{
    public function __construct(private readonly ConverterInterface $converter, private readonly ParserInterface $parser, private readonly ReflectionHydrator $reflectionHydrator)
    {
    }

    /**
     * @throws \ReflectionException
     */
    public function __invoke(array $data, string $className): mixed
    {
        $refClass = new \ReflectionClass($className);

        return $this->reflectionHydrator->hydrate(($this->converter)($data, ($this->parser)($className)), $refClass->newInstanceWithoutConstructor());
    }
}

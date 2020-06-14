<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper;

use Helicon\ObjectTypeParser\ParserInterface;
use Helicon\TypeConverter\ConverterInterface;
use Zend\Hydrator\ReflectionHydrator;

class ObjectMapper implements MapperInterface
{
    /**
     * @var ConverterInterface
     */
    private $converter;

    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var ReflectionHydrator
     */
    private $reflectionHydrator;

    public function __construct(ConverterInterface $converter, ParserInterface $parser, ReflectionHydrator $reflectionHydrator)
    {
        $this->converter = $converter;
        $this->parser = $parser;
        $this->reflectionHydrator = $reflectionHydrator;
    }

    /**
     * @return mixed|object
     *
     * @throws \ReflectionException
     */
    public function __invoke(array $data, string $className)
    {
        $refClass = new \ReflectionClass($className);

        return $this->reflectionHydrator->hydrate(($this->converter)($data, ($this->parser)($className)), $refClass->newInstanceWithoutConstructor());
    }
}

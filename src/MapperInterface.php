<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper;

interface MapperInterface
{
    public function __invoke(array $data, string $className): mixed;
}

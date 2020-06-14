<?php

declare(strict_types=1);

namespace Helicon\ObjectMapper;

interface MapperInterface
{
    /**
     * @return mixed object
     */
    public function __invoke(array $data, string $className);
}

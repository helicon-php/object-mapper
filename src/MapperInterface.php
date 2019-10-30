<?php

declare(strict_types=1);

namespace Helicon\DataMapper;

interface MapperInterface
{
    /**
     * @param array  $data
     * @param string $className
     *
     * @return mixed object
     */
    public function __invoke(array $data, string $className);
}

# helicon/object-mapper

This library is mapping for the array to object.  It's very simple.

# using

```shell script
$ composer req helicon/object-mapper
```

```php 
<?php

// ./example.php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';


use Helicon\ObjectMapper\ObjectMapper;
use Helicon\ObjectMapper\Tests\Friend;
use Helicon\ObjectTypeParser\Parser;
use Helicon\TypeConverter\Converter;
use Helicon\TypeConverter\Resolver;
use Helicon\TypeConverter\TypeCaster\ClassTypeCaster;
use Helicon\TypeConverter\TypeCaster\DateTimeCaster;
use Helicon\TypeConverter\TypeCaster\ScalarTypeCaster;
use Laminas\Hydrator\ReflectionHydrator;

class Friend 
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var self
     */
    private $child;    
}

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

// Factory object mapper
$factory = (new ObjectMapperFactory());
$mapper = $factory();
$object = ($mapper)($data, Friend::class)
var_dump($object); // Friend object.

```
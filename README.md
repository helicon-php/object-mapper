# helicon/object-mapper

This library is mapping for array to object.  It's very simple.

# using

```shell script
$ composer req helicon/object-mapper
```

```php 
<?php

// ./example.php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';


use Helicon\DataMapper\ObjectMapper;
use Helicon\DataMapper\Tests\Friend;
use Helicon\ObjectTypeParser\Parser;
use Helicon\TypeConverter\Converter;
use Helicon\TypeConverter\Resolver;
use Helicon\TypeConverter\TypeCaster\ClassTypeCaster;
use Helicon\TypeConverter\TypeCaster\DateTimeCaster;
use Helicon\TypeConverter\TypeCaster\ScalarTypeCaster;
use Zend\Hydrator\ReflectionHydrator;

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
$parser = new Parser();
$resolver = new Resolver();
$hydrator = new ReflectionHydrator();
$resolver->addConverter(new ScalarTypeCaster());
$resolver->addConverter(new DateTimeCaster());
$resolver->addConverter(new DateTimeCaster());
$resolver->addConverter(new ClassTypeCaster($resolver, $parser, $hydrator));


$converter = new Converter($resolver);

$mapper = new ObjectMapper($converter, $parser, $hydrator)
$object = ($mapper)($data, Friend::class)
var_dump($object); // Friend object.

```

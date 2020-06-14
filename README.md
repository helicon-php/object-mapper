# helicon/object-mapper
![test](https://github.com/helicon-php/object-mapper/workflows/test/badge.svg)

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
$mapper = (new ObjectMapperFactory())();
$object = ($mapper)($data, Friend::class)
var_dump($object); // Friend object.

```
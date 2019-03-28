<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{BaseFormat, JSON, XML, YAML};

 print_r("Anonymous Functions\n\n");


 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

$formats = [
    new JSON($data),
    new XML($data),
    new YAML($data)
];

function findByName(string $name, array $formats): ?BaseFormat {
    $found = array_filter($formats, function ($format) use ($name) {
        return $format->getName() === $name;
    });

    if (count($found)) {
        return reset($found);
    }

    return null;
}

var_dump(findByName('XML', $formats));
var_dump(findByName('', $formats));

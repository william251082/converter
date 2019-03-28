<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{BaseFormat, FromStringInterface, JSON, NamedFormatInterface, XML, YAML};

 print_r("Typed Argument & Return Types\n\n");

 function convertData(BaseFormat $format) {
     return $format->convert();
 }

function getFormatName(NamedFormatInterface $format): string {
    return $format->getName();
}

function getFormatByName(array $formats, string $name): ?BaseFormat {
    foreach ($formats as $format) {
        if ($format instanceof NamedFormatInterface && $format->getName() === $name) {
            return $format;
        }
    }

    return null;
}

// void mustn't return a value
function justDumpData(BaseFormat $format): void {
     var_dump($format->convert());
}

 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

$formats = [
    new JSON($data),
    new XML($data),
    new YAML($data)
];

var_dump(getFormatByName($formats, 'XML'));
justDumpData($formats[0]);




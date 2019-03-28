<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{FromStringInterface, JSON, NamedFormatInterface, XML, YAML};

 print_r("Interfaces\n\n");

 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

 $json = new JSON($data);
 $xml = new XML($data);
 $yml = new YAML($data);


print_r("\n\nResult of conversion\n\n");


$formats = [$json, $xml, $yml];

foreach ($formats as $format) {
    if ($format instanceof NamedFormatInterface) {
        var_dump($format->getName());
    }

    var_dump($format->convert());
    var_dump($format instanceof FromStringInterface);

    if ($format instanceof FromStringInterface) {
        var_dump($format->convertFromString('{"name":"John","surname":"Doe"}'));
    }
}


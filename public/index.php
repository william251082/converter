<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{BaseFormat, JSON, XML, YAML};

 print_r("Abstract Classes\n\n");

 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

 $json = new JSON($data);
 $xml = new XML($data);
 $yml = new YAML($data);
// $base = new BaseFormat($data); // abstract classes can't be instantiated

 var_dump($json);
 var_dump($xml);
 var_dump($yml);
// var_dump($base);

print_r("\n\nResult of conversion\n\n");
var_dump($json->convert());
var_dump($xml->convert());
var_dump($yml->convert());
//var_dump($base->convert());


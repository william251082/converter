<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

 use App\Format\{JSON,XML,YAML};

 print_r("Class fields and Methods\n\n");

 $json = new JSON([
     "key" => "value",
     "key1" => "value2"
 ]);
 $xml = new XML();
 $yml = new YAML();

// $json->data = "Some data";

// var_dump($json);
// var_dump($xml);
// var_dump($yml);

//var_dump($json->convert());
//var_dump(JSON::DATA);
// static method
var_dump(JSON::convertData());

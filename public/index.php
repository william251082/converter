<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

 use App\Format\{JSON,XML,YAML};

 print_r("Method and Field Visibility\n\n");

 $json = new JSON([
     "key" => "value",
     "key1" => "value2"
 ]);
 $xml = new XML();
 $yml = new YAML();

 var_dump($json);
// var_dump($xml);
// var_dump($yml);

//$json->data = []; // no access to private $data
var_dump($json->getData());
//$json->setData([]);
//var_dump($json->getData());

var_dump($json->convert());
var_dump((string)$json);


<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{JSON, XML, YAML};
use App\Serializer;

print_r("Dependency Injection\n\n");


 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

$serializer = new Serializer(new JSON());
var_dump($serializer->serialize($data));

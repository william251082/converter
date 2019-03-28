<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Format\{JSON, XML, YAML};

 print_r("Reflection API\n\n");


 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

$class = new ReflectionClass(JSON::class);
var_dump($class);
$method = $class->getConstructor();
var_dump($method);
$parameters = $method->getParameters();
var_dump($parameters);

foreach ($parameters as $parameter) {
    $type = $parameter->getType();
    var_dump((string)$type);
    var_dump($type->isBuiltin());
    var_dump($parameter->allowsNull());
    var_dump($parameter->getDefaultValue());
}

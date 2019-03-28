<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Container;
use App\Controller\IndexController;
use App\Format\{JSON, XML, YAML};
use App\Service\Serializer;

print_r("Simple Service Container\n\n");


 $data = [
     "name" => "John",
     "surname" => "Doe"
 ];

$container = new Container();

$container->addService('format.json', function () use ($container) {
    return new JSON();
});

$container->addService('format.xml', function () use ($container) {
    return new XML();
});

$container->addService('format.yaml', function () use ($container) {
    return new YAML();
});

$container->addService('format', function () use ($container) {
    return $container->getService('format.json');
});

$container->addService('serializer', function () use ($container) {
    return new Serializer($container->getService('format'));
});

$container->addService('controller.index', function () use ($container) {
    return new IndexController($container->getService('serializer'));
});

$controller = $container->getService('controller.index')->index();

var_dump($container);
var_dump($container->getServices());

var_dump($controller);

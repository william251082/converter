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
use App\Format\{FormatInterface, JSON, XML, YAML};
use App\Service\Serializer;

print_r("Autowired Service Container I\n\n");


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

$container->addService('format.yaml', function() use ($container) {
    return new YAML();
});

$container->addService('format', function () use ($container) {
    return $container->getService('format.xml');
}, FormatInterface::class);

$container->addService('serializer', function () use ($container) {
    return new Serializer($container->getService('format'));
});

$container->addService('controller.index', function () use ($container) {
    return new IndexController($container->getService('serializer'));
});

$container->loadServices('App\\Service');
$container->loadServices('App\\Controller');

//var_dump($container->getServices());
//var_dump($container->getService('controller.index')->index());

<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/../vendor/autoload.php';

use App\Kernel;

print_r("Annotations\n\n");

$kernel = new Kernel();
$kernel->boot();
$container = $kernel->getContainer();

var_dump($container->getServices());
var_dump($container
    ->getService('App\\Controller\\IndexController')
    ->index());
var_dump($container
    ->getService('App\\Controller\\PostController')
    ->index());

<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:26
 */

require __DIR__.'/vendor/autoload.php';

use App\Kernel;

print_r("Annotations II\n\n");

$kernel = (new Kernel())->boot();
$kernel->handleRequest();

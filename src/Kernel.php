<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-29
 * Time: 08:05
 */

namespace App;

use App\Annotations\Route;
use App\Format\{FormatInterface, JSON, XML, YAML};
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Kernel
{
    private $container;

    private $routes = [];

    public function __construct()
    {
        $this->container = new Container();
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function boot()
    {
        $this->bootContainer($this->container);

        return $this;
    }

    private function bootContainer(Container $container)
    {
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
            return $container->getService('format.json');
        }, FormatInterface::class);


        $container->loadServices('App\\Service');

        AnnotationRegistry::registerLoader('class_exists');
        $reader = new AnnotationReader();

        $routes = [];

        $container->loadServices(
            'App\\Controller',
            function (string $serviceName, \ReflectionClass $class) use ($reader, &$routes) {
                $route = $reader->getClassAnnotation($class, Route::class);
//                var_dump($route); die;

                if (!$route) {
                    return;
                }

                $baseRoute = $route->route;

                foreach ($class->getMethods() as $method) {
                    $route = $reader->getMethodAnnotation($method, Route::class);

                    if (!$route) {
                        continue;
                    }

                    $routes[str_replace('//', '/', $baseRoute . $route->route)] = [
                        'service' => $serviceName,
                        'method' => $method->getName()
                    ];
                }
//                var_dump($routes);
            }
        );
        $this->routes = $routes;
//        var_dump($routes);
    }

    public function handleRequest()
    {
        $uri = $_SERVER['REQUEST_URI'];

//        var_dump($uri);

        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            $response = $this->container
                ->getService($route['service'])
                ->{$route['method']}();
            echo $response;
            die;
        }
    }
}

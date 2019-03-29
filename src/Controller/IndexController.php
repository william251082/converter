<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-28
 * Time: 12:46
 */

namespace App\Controller;

use App\Annotations\Route;
use App\Service\Serializer;

class IndexController
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * IndexController constructor.
     *
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route(route="/")
     *
     * @return string
     */
    public function index()
    {
        return $this->serializer->serialize([
            'Action' => 'Index',
            'Time' => time(),
        ]);
    }
}

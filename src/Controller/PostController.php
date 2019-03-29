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

/**
 * Class PostController
 * @package App\Controller
 *
 * @Route(route="/posts")
 */
class PostController
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
            'Action' => 'Post',
            'Time' => time(),
        ]);
    }

    /**
     * @Route(route="/one")
     *
     * @return string
     */
    public function one()
    {
        return $this->serializer->serialize([
            'Action' => 'PostOne',
            'Time' => time(),
        ]);
    }
}

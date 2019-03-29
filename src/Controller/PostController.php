<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-28
 * Time: 12:46
 */

namespace App\Controller;

use App\Service\Serializer;

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

    public function index()
    {
        return $this->serializer->serialize([
            'Action' => 'Post',
            'Time' => time(),
        ]);
    }
}

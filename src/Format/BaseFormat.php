<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 10:44
 */

namespace App\Format;

class BaseFormat
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function convert()
    {
        return "Override me";
    }

    public function __toString()
    {
        return $this->convert();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 10:44
 */

namespace App\Format;

abstract class BaseFormat implements FormatInterface
{
    protected $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public abstract function convert(): string;

    public function __toString()
    {
        return $this->convert();
    }
}

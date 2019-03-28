<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 11:26
 */

namespace App\Format;

interface FromStringInterface
{
    public function convertFromString($string);
}

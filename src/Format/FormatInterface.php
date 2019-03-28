<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-28
 * Time: 12:07
 */

namespace App\Format;

interface FormatInterface
{
    public function convert(): string;
    public function setData(array $data): void ;
}

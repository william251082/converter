<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class JSON extends BaseFormat
{
    public function convert()
    {
        return json_encode($this->data);
//        return parent::convert();
    }
}

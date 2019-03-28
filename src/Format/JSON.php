<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class JSON extends BaseFormat implements FromStringInterface, NamedFormatInterface
{
    /**
     * @return false|string
     */
    public function convert()
    {
        return json_encode($this->data);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    public function convertFromString($string)
    {
        return json_decode($string, true);
    }

    public function getName()
    {
        return 'JSON';
    }
}

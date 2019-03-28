<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class JSON extends BaseFormat implements FromStringInterface, NamedFormatInterface, FormatInterface
{
    /**
     * @return false|string
     */
    public function convert(): string
    {
        return json_encode($this->data);
    }

    public function setData($data): void
    {
        $this->data = $data;
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

<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class JSON
{
    const DATA = [
        "success" => true
    ];

    public $data;

    /**
     * JSON constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function convert()
    {
        return json_encode(
            array_merge(
                self::DATA,
                $this->data
            )
        );
    }

    public static function convertData()
    {
        return json_encode(self::DATA);
    }
}

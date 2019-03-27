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

    private $data;

    /**
     * JSON constructor.
     *
     * @param $data
     */
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
        return $this->toJSON();
    }

    public static function convertData()
    {
        return json_encode(self::DATA);
    }

    public function __toString()
    {
        return $this->toJSON();
    }

    private function toJSON()
    {
        return json_encode(
            array_merge(
                self::DATA,
                $this->data
            )
        );
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-28
 * Time: 12:32
 */

namespace App;

use App\Format\FormatInterface;

class Serializer
{
    /**
     * @var FormatInterface
     */
    private $format;

    /**
     * Serializer constructor.
     *
     * @param FormatInterface $format
     */
    public function __construct(FormatInterface $format)
    {
        $this->format = $format;
    }

    public function serialize($data): string
    {
        $this->format->setData($data);

        return $this->format->convert();
    }
}

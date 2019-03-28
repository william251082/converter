<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class XML extends BaseFormat implements NamedFormatInterface, FormatInterface
{
    public function convert(): string
    {
        $result = '';

        foreach ($this->data as $key => $value) {
            $result .= '<' . $key . '>' . $value . '</' . $key . '>';
        }

        return htmlspecialchars($result);
    }
    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getName()
    {
        return 'XML';
    }
}

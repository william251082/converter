<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 2019-03-27
 * Time: 09:29
 */

namespace App\Format;

class YAML extends BaseFormat implements NamedFormatInterface
{
    public function convert()
    {
        $result = '';

        foreach ($this->data as $key => $value) {
            $result .= $key . ': ' . $value . "\n";
        }

        return htmlspecialchars($result);
    }

    public function getName()
    {
        return 'YAML';
    }
}

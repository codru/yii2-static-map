<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap\types;

use codru\staticmap\MapType;
use yii\base\Object;

class Google extends Object implements MapType
{
    const GOOGLE_MAP_URI = 'http://maps.googleapis.com/maps/api/staticmap?';

    public $center;
    public $zoom;
    public $size;
    public $scale;
    public $language;
    public $markers = [];

    function getMapUrl()
    {
        $url = static::GOOGLE_MAP_URI;
        foreach (get_object_vars($this) as $key => $value) {
            if (is_array($value)) {
                $url .= $key . '=';
                foreach ($value as $k => $v) {
                    if (!is_numeric($k)) {
                        $url .= $k . ':' . $v . '|';
                    } else {
                        $url .= $v . '|';
                    }
                }
                $url = $this->cutLastSymbol($url);
            } else {
                $url .= $key . '=' . $value . '&';
            }
        }
        $url = $this->cutLastSymbol($url);
        return $url;
    }

    private function cutLastSymbol($str)
    {
        return substr($str, 0, strlen($str) - 1);
    }
}

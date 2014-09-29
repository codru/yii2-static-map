<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap;


class GoogleMapGeneratingUriStrategy implements GeneratingUriStrategy
{
    const GOOGLE_MAP_URI = 'http://maps.googleapis.com/maps/api/staticmap?';

    function generate($mapOptions)
    {
        $url = static::GOOGLE_MAP_URI;
        foreach ($mapOptions as $key => $value) {
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

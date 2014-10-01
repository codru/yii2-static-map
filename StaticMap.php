<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap;


use yii\base\Widget;
use yii\base\Exception;
use yii\helpers\Html;


/**
 * Implements Strategy pattern
 * Uses $map['class'] to define strategy class
 */
class StaticMap extends Widget
{

    public $imageOptions = [];
    public $map = [];


    public function init()
    {
        parent::init();

        if (!isset($this->map['class'])) {
            throw new Exception('You should define a class for generating map');
        }

        echo Html::img($this->prepareUrl(), $this->imageOptions);
    }

    public function prepareUrl()
    {
        $mapType = $this->map['class'];
        unset($this->map['class']);
        return (new $mapType)->getMapUrl($this->map);
    }

}

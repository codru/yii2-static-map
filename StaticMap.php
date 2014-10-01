<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap;

use Yii;
use yii\base\Widget;
use yii\base\Exception;
use yii\helpers\Html;

class StaticMap extends Widget
{

    public $imageOptions = [];
    public $map = [];

    public function run()
    {
        echo Html::img($this->prepareUrl(), $this->imageOptions);
    }

    public function prepareUrl()
    {
        return Yii::createObject($this->map)->getMapUrl();
    }

}

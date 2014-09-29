<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap;


use yii\base\Widget;
use yii\helpers\Html;

class StaticMap extends Widget
{

    const GOOGLE_MAP = 'GoogleMap';
    const OPENSTREET_MAP = 'OpenStreetMap';

    public $imageOptions = [];
    public $mapOptions = [];


    public function init()
    {
        parent::init();

        echo Html::img($this->prepareUrl(), $this->imageOptions);
    }

    public function prepareUrl()
    {
        $uriStrategy = $this->imageOptions['mapType'];
        $uri =  new Uri(new $uriStrategy, $this->imageOptions['mapOptions']);
        return $uri->generate();
    }

}


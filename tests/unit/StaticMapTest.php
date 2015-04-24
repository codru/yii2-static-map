<?php

class StaticMapTest extends \yii\codeception\TestCase
{
    public $appConfig = '@tests/unit/_config.php';

    public function testGoogleMap()
    {
        $this->expectOutputString(
            '<img src="http://maps.googleapis.com/maps/api/staticmap?center=40,50&amp;zoom=13&amp;size=640x100&amp;scale=2&amp;language=en&amp;markers=size:tiny|40,5" alt="">'
        );
        echo \codru\staticmap\StaticMap::widget(
            [
                'map' => [
                    'class' => \codru\staticmap\types\Google::className(),
                    'options' => [
                        'center' => '40,50',
                        'zoom' => '13',
                        'size' => '640x100',
                        'scale' => '2',
                        'language' => Yii::$app->language,
                        'markers' => [
                            'size' => 'tiny',
                            '40,50',
                        ],
                    ],
                ],
            ]
        );
    }

    public function testOpenStreetMap()
    {
        $this->expectOutputString(
            '<img src="http://staticmap.openstreetmap.de/staticmap.php?center=40,50&amp;zoom=15&amp;size=1024x200&amp;language=en&amp;markers=40,50,ol-marke" alt="">'
        );
        echo \codru\staticmap\StaticMap::widget(
            [
                'map' => [
                    'class' => \codru\staticmap\types\OpenStreet::className(),
                    'options' => [
                        'center' => '40,50',
                        'zoom' => '15',
                        'size' => '1024x200',
                        'language' => Yii::$app->language,
                        'markers' => [
                            '40,50',
                            'ol-marker',
                        ],
                    ],
                ],
            ]
        );
    }
}

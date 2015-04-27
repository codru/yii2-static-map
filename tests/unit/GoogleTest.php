<?php

/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
class GoogleTest extends \yii\codeception\TestCase
{
    public $appConfig = '@tests/unit/_config.php';

    public function testGetMapUrl()
    {
        $map = [
            'class' => \codru\staticmap\types\Google::className(),
            'options' => [
                'center' => '40,50',
                'zoom' => '13',
                'size' => '640x100',
                'scale' => '2',
                'markers' => [
                    'size' => 'tiny',
                    '40,50',
                ],
            ],
        ];
        $this->assertEquals(
            'http://maps.googleapis.com/maps/api/staticmap?center=40,50&zoom=13&size=640x100&scale=2&markers=size:tiny|40,5',
            Yii::createObject($map)->getMapUrl()
        );
    }
}

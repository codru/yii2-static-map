<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

class OpenStreetTest extends \yii\codeception\TestCase
{
    public $appConfig = '@tests/unit/_config.php';

    public function testGetMapUrl()
    {
        $map = [
            'class' => \codru\staticmap\types\OpenStreet::className(),
            'options' => [
                'center' => '40,50',
                'zoom' => '15',
                'size' => '1024x200',
                'markers' => [
                    '40,50',
                    'ol-marker',
                ],
            ],
        ];
        $this->assertEquals(
            'http://staticmap.openstreetmap.de/staticmap.php?center=40,50&zoom=15&size=1024x200&markers=40,50,ol-marke',
            Yii::createObject($map)->getMapUrl()
        );
    }
}

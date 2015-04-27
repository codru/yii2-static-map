Yii2 Static Map
===============
[![Build Status](https://secure.travis-ci.org/yiisoft/yii2.png)](http://travis-ci.org/yiisoft/yii2)
Extension for generating static maps (for example for contacts page). Now support google map and openstreet map

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist codru/yii2-static-map "*"
```

or add

```
"codru/yii2-static-map": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \codru\staticmap\StaticMap::widget(
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
) ?>
```
Or
```php
<?= \codru\staticmap\StaticMap::widget(
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
) ?>
```

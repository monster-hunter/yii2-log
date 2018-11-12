[![Latest Stable Version](https://poser.pugx.org/monsterhunter/yii2-log/v/stable)](https://packagist.org/packages/monsterhunter/yii2-log)
[![Total Downloads](https://poser.pugx.org/monsterhunter/yii2-log/downloads)](https://packagist.org/packages/monsterhunter/yii2-log)
[![License](https://poser.pugx.org/monsterhunter/yii2-log/license)](https://packagist.org/packages/monsterhunter/yii2-log)
[![StyleCI](https://styleci.io/repos/97901112/shield?branch=master)](https://styleci.io/repos/97901112)
[![Build Status](https://travis-ci.org/monster-hunter/yii2-log.svg?branch=master)](https://travis-ci.org/monster-hunter/yii2-log)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/build.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/build-status/master)

# Yii2 Log Module

## Run migrations

```bash
  php yii migrate --migrationPath=@yii/log/migrations/
```

## Config backend module

```php
'modules'=> [
    'log' => [
        'class' => 'monsterhunter\yii2\log\Module',
        //'layout' =>'@app/views/layouts/main'  //custom layout  
    ]
]
```

## Config log compoennt

```php
'components' => [
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\DbTarget',
                'levels' => ['error', 'warning'],
                'except' => ['yii\web\HttpException:404'],
                'prefix' => function () {
                    $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                    return sprintf('[%s][%s]', Yii::$app->id, $url);
                },
                'logVars' => [],
                'logTable' => '{{%system_log}}'
            ],
        ],
    ],
]
```
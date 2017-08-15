[![Latest Stable Version](https://poser.pugx.org/monsterhunter/yii2-log/v/stable)](https://packagist.org/packages/monsterhunter/yii2-log)
[![Total Downloads](https://poser.pugx.org/monsterhunter/yii2-log/downloads)](https://packagist.org/packages/monsterhunter/yii2-log)
[![License](https://poser.pugx.org/monsterhunter/yii2-log/license)](https://packagist.org/packages/monsterhunter/yii2-log)
[![StyleCI](https://styleci.io/repos/97901112/shield?branch=master)](https://styleci.io/repos/97901112)
[![Build Status](https://travis-ci.org/monster-hunter/yii2-log.svg?branch=master)](https://travis-ci.org/monster-hunter/yii2-log)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/badges/build.png?b=master)](https://scrutinizer-ci.com/g/monster-hunter/yii2-log/build-status/master)

# Yii2 Log Module

1 执行数据库迁移:
       
```       
  ./yii migrate --migrationPath=@yii/log/migrations/
        
```
2 配置module：


```
  'log' => [
      'class' => 'monsterhunter\yii2\log\Module',
      'layout' =>'@app/views/layouts/main'  //your layout  
  ]
  
```
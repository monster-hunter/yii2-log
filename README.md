[![StyleCI](https://styleci.io/repos/97901112/shield?branch=master)](https://styleci.io/repos/97901112)
[![Build Status](https://travis-ci.org/monster-hunter/yii2-log.svg?branch=master)](https://travis-ci.org/monster-hunter/yii2-log)

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
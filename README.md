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
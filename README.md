# yii2-log
1 cd 到项目根目录，在common模块配置好数据库配置，执行命令行创建表：./yii migrate --migrationPath=@yii/log/migrations/ 
2 module配置：
 'yourname' => [
        'class' => 'monsterhunter\yii2\log\Module',
        'layout' =>'@app/views/layouts/main'  //your layout  
        ]

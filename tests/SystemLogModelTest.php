<?php
/**
 * Created by PhpStorm.
 * User: zjw
 * Date: 2017/8/14
 * Time: 上午11:10
 */

namespace monsterhunter\yii2\log\tests;

use monsterhunter\yii2\log\models\SystemLog;
use yii\log\Logger;

class SystemLogModelTest extends TestCase
{
    public function testFind()
    {
        $data = SystemLog::find()->where(['level' => Logger::LEVEL_ERROR])->one();
        $this->assertTrue($data->category == 'test-0');
        $this->assertTrue($data->message == 'test-0');

        $data = SystemLog::find()->where(['level' => Logger::LEVEL_WARNING])->one();
        $this->assertTrue($data->category == 'test-1');
        $this->assertTrue($data->message == 'test-1');
    }

    public function testDelete()
    {
        $res = SystemLog::deleteAll(['level' => Logger::LEVEL_ERROR]);
        $this->assertTrue(count($res) > 0);
    }

    public function testUpdate()
    {
        $data = SystemLog::findOne(['level' => Logger::LEVEL_ERROR]);
        $data->category = "test-update-0";
        $this->assertTrue($data->save());
    }
}

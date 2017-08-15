<?php
/**
 * Created by PhpStorm.
 * User: zjw
 * Date: 2017/8/14
 * Time: 下午4:05
 */

namespace monsterhunter\yii2\log\tests;

use Yii;
use yii\log\Logger;

class DefaultControllerTest extends TestCase
{
    public function testIndex()
    {
        $param = [
            'SystemLogSearch' => []
        ];
        Yii::$app->request->queryParams = $param;
        $res = Yii::$app->runAction('log/default');
        $this->assertTrue($res['dataProvider']->getTotalCount() == 2);

        $param = [
            'SystemLogSearch' => [
                'level' => Logger::LEVEL_ERROR
            ]
        ];
        Yii::$app->request->queryParams = $param;
        $res = Yii::$app->runAction('log/default');
        $this->assertTrue($res['dataProvider']->getTotalCount() == 1);
    }

    public function testView()
    {
        $res = Yii::$app->runAction('log/default/view', ['id' => 1]);
        $this->assertTrue($res->level == Logger::LEVEL_ERROR);
    }

    public function testDelete()
    {
        $res = Yii::$app->runAction('log/default/delete', ['id' => 1]);
        $this->assertTrue($res > 0);
    }
}

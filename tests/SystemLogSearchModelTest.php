<?php
/**
 * Created by PhpStorm.
 * User: zjw
 * Date: 2017/8/14
 * Time: 下午3:02
 */

namespace monsterhunter\yii2\log\tests;

use monsterhunter\yii2\log\models\search\SystemLogSearch;
use yii\log\Logger;
use yii;

class SystemLogSearchModelTest extends TestCase
{
    public function testSearch()
    {
        $params = [
            'SystemLogSearch' => [
                'level' => Logger::LEVEL_ERROR
            ]
        ];
        $model = new SystemLogSearch();
        $res = $model->search($params);
        $this->assertTrue($res->count == 1);

        $params = [
            'SystemLogSearch' => [
                'level' => Logger::LEVEL_INFO
            ]
        ];
        $model = new SystemLogSearch();
        $res = $model->search($params);
        $this->assertTrue($res->count == 0);
    }
}

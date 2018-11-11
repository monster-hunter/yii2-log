<?php

namespace monsterhunter\yii2\log\tests;

use pheme\settings\models\Setting;
use PHPUnit_Framework_TestCase;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

/**
 * Created by PhpStorm.
 * User: zjw
 * Date: 2017/8/7
 * Time: 下午1:49
 */
class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    public $model;

    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();
        $this->createTestDbData();
        $this->generateTestData();
    }

    protected function tearDown()
    {
        $this->destroyTestDbData();
        $this->destroyApplication();
    }

    /**
     * Populates Yii::$app with a new application
     * The application will be destroyed on tearDown() automatically.
     *
     * @param array $config The application configuration, if needed
     * @param string $appClass name of the application class to create
     */
    protected function mockApplication($config = [], $appClass = '\yii\console\Application')
    {
        new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'mysql:host=localhost:3306;dbname=test',
                    'username' => 'root',
                    'password' => '',
                    'tablePrefix' => 'tb_'
                ],
                'i18n' => [
                    'translations' => [
                        '*' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                        ]
                    ]
                ],
                'log' => [
                    'traceLevel' => YII_DEBUG ? 3 : 0,
                    'targets' => [
                        'class' => 'yii\log\DbTarget',
                        'levels' => ['error', 'warning'],
                        'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                        'prefix' => function () {
                            $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                            return sprintf('[%s][%s]', Yii::$app->id, $url);
                        },
                        'logVars' => [],
                        'logTable' => '{{%system_log}}'
                    ],
                    'class' => 'yii\log\Logger',
                ],
            ],
            'modules' => [
                'log' => [
                    'class' => 'monsterhunter\yii2\log\Module',
                    'controllerNamespace' => 'monsterhunter\yii2\log\tests\controllers'
                ]
            ]
        ], $config));
    }

    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application')
    {
        new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'mysql:host=localhost:3306;dbname=test',
                    'username' => 'root',
                    'password' => '',
                    'tablePrefix' => 'tb_'
                ],
                'i18n' => [
                    'translations' => [
                        '*' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                        ]
                    ]
                ],
                'log' => [
                    'traceLevel' => YII_DEBUG ? 3 : 0,
                    'targets' => [
                        'class' => 'yii\log\DbTarget',
                        'levels' => ['error', 'warning'],
                        'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                        'prefix' => function () {
                            $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                            return sprintf('[%s][%s]', Yii::$app->id, $url);
                        },
                        'logVars' => [],
                        'logTable' => '{{%system_log}}'
                    ],
                    'class' => 'yii\log\Logger',
                ],
            ],
            'modules' => [
                'log' => [
                    'class' => 'monsterhunter\yii2\log\Module',
                    'controllerNamespace' => 'monsterhunter\yii2\log\tests\controllers'
                ]
            ]
        ], $config));
    }

    /**
     * @return string vendor path
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        if (Yii::$app && Yii::$app->has('session', true)) {
            Yii::$app->session->close();
        }
        Yii::$app = null;
    }

    protected function destroyTestDbData()
    {
        $db = Yii::$app->getDb();
        $db->createCommand()->dropTable('tb_system_log')->execute();
    }

    protected function createTestDbData()
    {
        //Yii::$app->runAction('/migrate/up', ['migrationPath' => '@migrate']);
        $db = Yii::$app->getDb();
        $sql = <<<EOF
            -- auto-generated definition
            create table tb_system_log
            (
                id bigint auto_increment
                    primary key,
                level int null,
                category varchar(255) null,
                log_time double null,
                prefix text null,
                message text null
            )
            ;

            create index idx_log_category
                on tb_system_log (category)
            ;

            create index idx_log_level
                on tb_system_log (level)
            ;
EOF;
        try {
            $db->createCommand($sql)->execute();
        } catch (Exception $e) {
            return;
        }
    }

    private function generateTestData()
    {
        $logger = Yii::$app->log->logger;
        $messsageData = [
            'test-0',
            Logger::LEVEL_ERROR,
            'test-0',
            time(),
            [],
        ];
        $logger->messages[] = $messsageData;
        $logger->flush(true);

        $messsageData = [
            'test-1',
            Logger::LEVEL_WARNING,
            'test-1',
            time(),
            [],
        ];
        $logger->messages[] = $messsageData;
        $logger->flush(true);
    }
}

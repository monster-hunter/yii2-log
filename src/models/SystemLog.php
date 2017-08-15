<?php

namespace monsterhunter\yii2\log\models;

use monsterhunter\yii2\log\Module;

/**
 * This is the models class for table "system_log".
 *
 * @property integer $id
 * @property integer $level
 * @property string $category
 * @property integer $log_time
 * @property string $prefix
 * @property integer $message
 */
class SystemLog extends \yii\db\ActiveRecord
{
    const CATEGORY_NOTIFICATION = 'notification';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'log_time'], 'integer'],
            [['log_time'], 'required'],
            [['prefix','message'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('log', 'ID'),
            'level' => Module::t('log', 'Level'),
            'category' => Module::t('log', 'Category'),
            'log_time' => Module::t('log', 'Log Time'),
            'prefix' => Module::t('log', 'Prefix'),
            'message' => Module::t('log', 'Message'),
        ];
    }
}

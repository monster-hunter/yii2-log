<?php

namespace monsterhunter\yii2\log\models;

use Yii;

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
            [['level', 'log_time', 'message'], 'integer'],
            [['log_time'], 'required'],
            [['prefix'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'level' => Yii::t('app', 'Level'),
            'category' => Yii::t('app', 'Category'),
            'log_time' => Yii::t('app', 'Log Time'),
            'prefix' => Yii::t('app', 'Prefix'),
            'message' => Yii::t('app', 'Message'),
        ];
    }
}

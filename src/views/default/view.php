<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use monsterhunter\yii2\log\Module;

$this->title = 'Error #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('log', 'System Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-log-view">

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            'category',
            [
                'attribute' => 'log_time',
                'format' => 'datetime',
                'value' => (int)$model->log_time
            ],
            'prefix:ntext',
            [
                'attribute' => 'message',
                'format' => 'raw',
                'value' => Html::tag('pre', $model->message, ['style' => 'white-space: pre-wrap'])
            ],
        ],
    ]) ?>

</div>

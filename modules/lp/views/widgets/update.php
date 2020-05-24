<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\dishes\models\backend\Ingredient */

$this->title = 'Редактирование: ';
$this->params['breadcrumbs'][] = ['label' => 'Виджеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="whatsapp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('whatsapp', [
        'models' => $models,'pages' => $pages, 'params' => $params,
    ]) ?>

</div>

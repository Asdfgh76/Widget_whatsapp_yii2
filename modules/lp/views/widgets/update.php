<?php

use yii\helpers\Html;

/** 
* @var $this yii\modules\lp\views\widget 
*
* @param array $model 
* @param array $pages
* @param array $params
 */

$this->title = 'Редактирование: ';
$this->params['breadcrumbs'][] = [
    'label' => 'Виджеты',
    'url' => ['index']
];
$this->params['breadcrumbs'][] = 'Редактирование:';
?>


<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
        'params' => $params
    ]) 
?>



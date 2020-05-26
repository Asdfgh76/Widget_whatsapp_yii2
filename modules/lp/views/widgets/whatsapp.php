<?php

/** 
* @var $this yii\modules\lp\views\widget 
*
* @param array $model 
* @param array $pages
* @param array $params
 */

$this->title = 'Создание: ';
$this->params['breadcrumbs'][] = [
    'label' => 'Виджеты',
     'url' => ['index']
    ];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
        'params' => $params
    ]) 
?>
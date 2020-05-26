<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** 
* @var $this yii\modules\lp\views\widget 
*
* @param array $model 
* @param array $pages
* @param array $params
* @var $dataProvider yii\data\ActiveDataProvider 
*/

$this->title = 'Виджеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-ing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать виджет', ['whatsapp'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'domain',
                'label'=>'Адрес',
            ],
            [
                'attribute'=>'phone',
                'label'=>'Телефон',
            ],
            [
                'attribute'=>'pulse',
                'label'=>'Пульсация',
                'value' => function($data){
                    return $data['pulse'] ? 'Включено' : 'Выключено';
                }
            ],
            [
                'attribute'=>'label',
                'label'=>'Текст',
            ],
            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                'update'=>function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',['/lp/widgets/update?id='.$model['id'].'']);
            },
                'view'=>function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/lp/default/view?pages_id='.$model['pages_id'].'']);
            },
                'delete'=>function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>',['/lp/widgets/delete?id='.$model['id'].'']);
            }
        ]
        ],
        ],
    ]); ?>

</div>
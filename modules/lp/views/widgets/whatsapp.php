<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'Создание: ';
$this->params['breadcrumbs'][] = ['label' => 'Виджеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="whatsapp-form">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($models, 'page_id')->dropdownList(
            $pages,$params); ?>

    <?= $form->field($models, 'phone')->widget(PhoneInput::className(), [
    'jsOptions' => [
        'preferredCountries' => ['ru'],
                   ]
    ]); ?>

    <?= $form->field($models, 'label')->textInput(); ?>

    <?= $form->field($models, 'pulse')->checkbox(['label'=>'Включить мерцание','labelOptions' => [
            'style' => 'padding-left:15px; padding-top:10px;'
        ]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>
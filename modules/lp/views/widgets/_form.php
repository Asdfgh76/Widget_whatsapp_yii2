<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;

/* @var $this yii\modules\lp\views\widget 
*  @var $model modules\lp\models\PagesWidgetsWhatsapp
*  @var $form yii\widgets\ActiveForm
*/

?>

<div class="whatsapp-form">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->dropdownList(
            $pages,$params); ?>

    <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
    'jsOptions' => [
        'preferredCountries' => ['ru'],
                   ]
    ]); ?>

    <?= $form->field($model, 'label')->textInput(); ?>

    <?= $form->field($model, 'pulse')->checkbox([
        'label'=>'Включить мерцание',
        'labelOptions' => [
            'style' => 'padding-left:15px; padding-top:10px;'
        ]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [
            'class' => 'btn btn-success'
            ]) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>

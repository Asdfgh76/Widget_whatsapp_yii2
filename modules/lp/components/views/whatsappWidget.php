<?php
use yii\helpers\Html;

//Проверяем включить пульсацию или нет
    $model->isPulse($model->pulse);
?>
<?php
//Если текста нет, то блок span не выводим
    $model->isLabel($model->label);
?>
<div id="whatsappFixedWidget" style="position:fixed;bottom:150px;right:50px;width:50px;height:50px;z-index:9999;">
<a href="https://wa.me/<?= $model->printPhone($model->phone) ?>" title="WhatsApp" target="_blank">
<img id = "imgwhatsapp"  src="https://ex-in.ru/img/whatsapp_icon.png" alt="WhatsApp">
<span id="whatsappFixedWidgetTooltip"><?= Html::encode($model->label) ?></span>
</a>
</div>


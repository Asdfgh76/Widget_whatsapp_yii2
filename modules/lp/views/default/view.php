<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\WhatsappWidget;

/* @var $this yii\web\View */
/* @var $model common\modules\dishes\models\backend\Ingredient */

?>
<!--Подключаем виджет Whatsapp-->
<div class="widget-view">

    <?php echo WhatsappWidget::widget(['page_id' => $_GET['id']]); ?>

</div>
<?php

use app\modules\lp\components\WhatsappWidget;

/** 
* @var $this yii\modules\lp\views\default
*
* @param int $pages_id
*/

?>
<!--Подключаем виджет Whatsapp-->
<div class="widget-view">

    <?php echo WhatsappWidget::widget(['page_id' => $pages_id]); ?>

</div>
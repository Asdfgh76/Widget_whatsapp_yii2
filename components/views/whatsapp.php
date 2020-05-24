<style>
#whatsappFixedWidgetTooltip {
    position: absolute;
    width: auto;
    color: #FFF;
    background: #000;
    padding: 10px;
    font-size: 14px;
    text-align: left;
    border-radius: 0;
    visibility: visible;
    opacity: 0.8;
    right: 100%;
    top: 75%;
    margin-top: -15px;
    margin-right: 15px;
    z-index: 999;
    }
#imgwhatsapp{
    width: 80px;
    border-radius: 50%;
    
}   
@keyframes radial-pulse {
  0% {
    box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.5);
  }

  100% {
    box-shadow: 0 0 0 40px rgba(0, 0, 0, 0);
  }
}
</style>

<?php
//Проверяем включить пульсацию или нет
 if ($models->pulse == 1) {
    echo "<style> #imgwhatsapp {animation: radial-pulse 1s infinite;} </style>";
}
?>
<?php
//Если текста нет, то блок span не выводим
 if (empty($models->label)) {
    echo "<style> #whatsappFixedWidgetTooltip {display:none;} </style>";
}
?>
<div id="whatsappFixedWidget" style="position:fixed;bottom:150px;right:50px;width:50px;height:50px;z-index:9999;">
<a href="https://wa.me/<?= $models->phone ?>" title="WhatsApp" target="_blank">
<img id = "imgwhatsapp"  src="https://ex-in.ru/img/whatsapp_icon.png" alt="WhatsApp">
<span id="whatsappFixedWidgetTooltip"><?= $models->label ?></span>
</a>
</div>


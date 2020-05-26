<?php

namespace app\modules\lp\components;

use yii\base\Widget;
use app\modules\lp\models\PagesWidgetsWhatsapp;

/**
 * Класс добавления виджета на страницу
 */
class WhatsappWidget extends Widget
{
    public $page_id;

    
    public function init()
    {

        parent::init();

    }
    
    /**
     * Выборка данных из таблицы по $this->page_id
     * 
     * @param int $this->page_id
     *
     * @return array $model
     *
     */
    public function run()
    {
        $model = PagesWidgetsWhatsapp::find()
        ->where(['page_id' => $this->page_id])
        ->one();

        return $this->render('whatsappWidget', ['model' => $model]);
    }
}
?>
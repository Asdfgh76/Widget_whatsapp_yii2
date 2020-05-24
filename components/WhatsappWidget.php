<?php

namespace app\components;

use yii\base\Widget;
use app\modules\lp\models\PagesWidgetsWhatsapp;

/**
 * Класс добавления виджета на страницу
 */
class WhatsappWidget extends Widget
{
    public $page_id;
    public $model;

    /**
     * Выборка данных из таблицы по $this->page_id
     * 
     * @param int $this->page_id
     *
     * @return array $this->model
     */
    public function init(){
        parent::init();

        $this->model = PagesWidgetsWhatsapp::find()
        ->where(['page_id' => $this->page_id])
        ->one();
  
    }
    
    /**
     * Возвращаем результат
     *
     * @return array $$this->model
     */
    public function run(){
        return $this->render('whatsapp', ['models' => $this->model]);
    }
}
?>
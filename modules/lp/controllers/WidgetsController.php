<?php

namespace app\modules\lp\controllers;

use app\modules\lp\models\Pages;
use app\modules\lp\models\PagesWidgetsWhatsapp;
use yii\helpers\ArrayHelper;
use Yii;
use yii\data\SqlDataProvider;

/**
 * Контроллер создания виджета Whatsapp
 * 
 * @package app\modules\lp\controllers
 */
class WidgetsController extends \yii\web\Controller
{
    /**
     * @var string $defaultAction
     */
    public $defaultAction = 'whatsapp';

    /**
     * Создание свойства $dataProvider 
     *
     * @return array $dataProvider
     */
    public function actionIndex()
    {
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT pages.id AS pages_id, pages.domain, pages_widgets_whatsapp.id, pages_widgets_whatsapp.phone, pages_widgets_whatsapp.label,
            pages_widgets_whatsapp.pulse
            FROM
            pages
            INNER JOIN 
            pages_widgets_whatsapp
            ON pages.id = pages_widgets_whatsapp.page_id',
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Запись данных из формы создания виджета
     *
     * @return array $models 
     * @return array $pages
     * @return array $params
     */
    public function actionWhatsapp()
    {
        $models = new PagesWidgetsWhatsapp();
        
        $pages = Pages::find()->all();
        $pages = ArrayHelper::map($pages,'id','domain');
        $params = ['prompt'=>'Выберите сайт'];

        if ($models->load(Yii::$app->request->post()) && $models->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('whatsapp', ['models' => $models, 'pages' => $pages, 'params' => $params]);
    }

    /**
     * Запись измененных данных виджета
     *
     * @param int $id
     * 
     * @return array $models 
     * @return array $pages
     * @return array $params
     */
    public function actionUpdate($id)
    {
        $models = PagesWidgetsWhatsapp::findOne($id);
        
        if ($models->load(Yii::$app->request->post()) && $models->save()) {
            return $this->redirect(['index']);
        }
        $pages = Pages::find()->all();
        $pages = ArrayHelper::map($pages,'id','domain');
        $params = ['prompt'=>'Выберите сайт'];
        return $this->render('update', ['models' => $models, 'pages' => $pages, 'params' => $params]);
    }

    /**
     * Удаление данных
     *
     * @param int $id
     * 
     */
    public function actionDelete($id)
    {
        PagesWidgetsWhatsapp::findOne($id)->delete();

        return $this->redirect(['index']);
    }

}

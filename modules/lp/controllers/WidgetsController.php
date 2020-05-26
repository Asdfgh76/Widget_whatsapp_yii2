<?php

namespace app\modules\lp\controllers;

use Yii;
use app\modules\lp\models\Pages;
use app\modules\lp\models\PagesWidgetsWhatsapp;
use yii\helpers\ArrayHelper;


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
        $data = new PagesWidgetsWhatsapp();
        
        $dataProvider = $data->sample();
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Запись данных из формы создания виджета
     *
     * @return void
     */
    public function actionWhatsapp()
    {
        $model = new PagesWidgetsWhatsapp();
        
        $pages = Pages::find()->all();
        $pages = ArrayHelper::map($pages,'id','domain');
        $params = ['prompt'=>'Выберите сайт'];

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('whatsapp', [
            'model' => $model, 
            'pages' => $pages, 
            'params' => $params
            ]);
    }

    /**
     * @param mixed $id
     * 
     * @return void
     */
    public function actionUpdate($id)
    {
        $model = PagesWidgetsWhatsapp::findOne($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $pages = Pages::find()->all();
        $pages = ArrayHelper::map($pages,'id','domain');
        $params = ['prompt'=>'Выберите сайт'];
        return $this->render('update', [
            'model' => $model,
            'pages' => $pages,
            'params' => $params
            ]);
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


<?php

namespace app\modules\lp\controllers;

use yii\web\Controller;

/**
 * Default controller for the `lp` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * 
     * @param int $id
     *
     */
    public function actionView($id)
    {
        return $this->render('view');
    }
}

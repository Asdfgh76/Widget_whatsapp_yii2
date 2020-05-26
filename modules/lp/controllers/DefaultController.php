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
    public function actionView($pages_id)
    {
        return $this->render('view', [
            'pages_id' => $pages_id
        ]);
    }
}

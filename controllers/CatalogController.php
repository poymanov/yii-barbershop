<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Manufacturers;

class CatalogController extends Controller
{
    public function actionIndex() 
    {
        // Получение списка всех производителей
        $manufacturers = Manufacturers::find()->all();

        return $this->render('index',compact('manufacturers'));
    }
}
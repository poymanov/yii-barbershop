<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Manufacturers;
use app\models\Categories;

class CatalogController extends Controller
{
    public function actionIndex() 
    {
        // Получение списка всех производителей
        $manufacturers = Manufacturers::find()->all();

        // Получение списка всех категорий товаров
        $categories = Categories::find()->all();

        return $this->render('index',compact('manufacturers','categories'));
    }
}
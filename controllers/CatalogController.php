<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Manufacturers;
use app\models\Categories;
use app\models\Products;

class CatalogController extends Controller
{
    public function actionIndex() 
    {
        // Получение списка всех производителей
        $manufacturers = Manufacturers::find()->all();

        // Получение списка всех категорий товаров
        $categories = Categories::find()->all();

        // Получение всех товаров
        $products = Products::find()->all();

        return $this->render('index',compact('manufacturers','categories','products'));
    }
}
<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
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
        
        $query = Products::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 6]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',compact('manufacturers','categories','products','pages'));
    }
}
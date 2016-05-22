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
    public function actionIndex($categorySlug = null)
    {
        // Получение списка всех производителей
        $manufacturers = Manufacturers::find()->all();

        // Получение списка всех категорий товаров
        $categories = Categories::find()->all();

        $category = null;

        // Если указана категория, то получаем товары только по ней
        if($categorySlug) {
            // Получение категории по псевдониму
            $category = Categories::find()->where(['slug' => $categorySlug])->one();

            // 404 ошибка, если категория не найдена
            if(!$category) {
                throw new \yii\web\HttpException('404','Товар не существует');
                return;
            }

            // Получение товаров по категории
            $query = Products::find()->where(['category_id' => $category->id]);

        } else {
            // Получение всех товаров
            $query = Products::find();
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 6]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',compact('manufacturers','categories','products','pages','category'));
    }

    public function actionShow($categorySlug,$productSlug)
    {
        // Получение товара по псевдониму
        $product = Products::find()->where(['slug' => $productSlug])->one();

        // 404 ошибка, если товар не существует
        if(!$product) {
            throw new \yii\web\HttpException('404','Товар не существует');
            return;
        }
        
        // Получение категории по псевдониму
        $category = Categories::find()->where(['slug' => $categorySlug])->one();

        // 404 ошибка, если категория не найдена
        if(!$category) {
            throw new \yii\web\HttpException('404','Товар не существует');
            return;
        }

        // 404 ошибка, если категория из запроса не соответствует категории продукта
        if($product->category_id != $category->id) {
            throw new \yii\web\HttpException('404','Товар не существует');
            return;
        }

        return $this->render('show',compact('product','category'));

    }
}
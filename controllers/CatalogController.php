<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Categories;
use app\models\Products;

class CatalogController extends Controller
{
    public function actionIndex($categorySlug = null)
    {
        
        $curCategory = null;

        // Получение get-параметров для запроса
        $request = Yii::$app->request;
        $getParams = $request->get();

        // Если указана категория, то получаем товары только по ней
        if($categorySlug) {
            // Получение категории по псевдониму
            $curCategory = Categories::find()->where(['slug' => $categorySlug])->one();

            // 404 ошибка, если категория не найдена
            if(!$curCategory) {
                throw new \yii\web\HttpException('404','Товар не существует');
                return;
            }

            // Получение массива id производителей
            $manufacturersId = $this->getParamsIndex($getParams);

            // Получение товаров по категории
            $query = Products::find()->where(['category_id' => $curCategory->id]);

            // Отбор по производителям
            if ($manufacturersId) {
                $query->where(['manufacturer_id' => $manufacturersId]);
            }

        } else {

            // Получение массива id производителей
            $manufacturersId = $this->getParamsIndex($getParams);

            // Получение всех товаров
            $query = Products::find();

            // Отбор по производителям
            if ($manufacturersId) {
                $query->where(['manufacturer_id' => $manufacturersId]);
            }
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 6]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',compact('products','pages','curCategory','manufacturersId'));
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

    public function actionSearch()
    {
        // Получение post-параметров
        $request = Yii::$app->request;
        $post = $request->post();

        // Массив выбранных производителей
        $arrMans = array();

        // Получение параметров по производителю
        foreach ($post as $key => $postItem) {
            if (strpos($key, "man") !== false) {
                $arrMans[] = str_replace("man-","",$key);
            }
        }

        // Получение id категории
        $category_id = $post['category'];
        
        // Для id = 0 перенаправление на страницу со всеми категориями
        if ($category_id == 0) {

            $redirectUrl = "/catalog/";

            // Подстановка get-параметров по производителям
            $getParams = $this->getParams($arrMans);
            $redirectUrl .= $getParams;

            return Yii::$app->getResponse()->redirect($redirectUrl);
        }

        // Поиск категории по id
        $category = Categories::findOne($category_id);

        // 404 ошибка, если категория не найдена
        if(!$category) {
            throw new \yii\web\HttpException('404','Категория не существует');
            return;
        }

        // Url для переадресации
        $redirectUrl = "/catalog/$category->slug";

        // Подстановка get-параметров по производителям
        $getParams = $this->getParams($arrMans);
        $redirectUrl .= $getParams;
        
        // Перенаправление на страницу категории
        return Yii::$app->getResponse()->redirect($redirectUrl);
    }

    protected function getParams($arrParams)
    {
        $strParams = "";

        if ($arrParams) {
            $strParams.= "?";
            foreach ($arrParams as $param) {
                $strParams .= "man".$param."&";
            }

            $strParams = substr($strParams, 0, -1);
        }

        return $strParams;
    }

    protected function getParamsIndex($getParams)
    {
        $arrWhere = "";

        if ($getParams) {
            foreach ($getParams as $key => $value) {
                if (strpos($key, "man") !== false) {
                    $arrWhere[] = str_replace("man","",$key);
                }
            }
        }

        return $arrWhere;
    }
}
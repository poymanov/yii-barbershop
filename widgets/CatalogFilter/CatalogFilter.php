<?php

namespace app\widgets\CatalogFilter;

use yii\helpers\Html;
use yii\base\Widget;
use app\models\Manufacturers;
use app\models\Categories;

class CatalogFilter extends Widget
{

    public $manufacturersId;
    public $curCategory;

    public function run()
    {
        // Получение списка всех производителей
        $manufacturers = Manufacturers::find()->all();

        // Получение списка всех категорий товаров
        $categories = Categories::find()->all();

        return $this->render('filter',[
            'manufacturers' => $manufacturers,
            'categories' => $categories,
            'manufacturersId' => $this->manufacturersId,
            'curCategory' => $this->curCategory
        ]);
    }
}
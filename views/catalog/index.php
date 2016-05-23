<?php

/* @var $this yii\web\View */
// Title для конкретной категории, если она существует
if($curCategory) {
    $this->title = $curCategory->name;
} else {
    $this->title = 'Каталог';
}

use app\widgets\catalogpager\CatalogPager;
use yii\helpers\Url;

?>
<main class="container container-catalog clearfix">
    <h1 class="index-title">Средства для ухода</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="/">Главная</a>
        </li>
        <li>
            <a href="/catalog">Магазин</a>
        </li>
        <?php if($curCategory) {?>
            <li>
                <?=$curCategory->name?>
            </li>
        <?php } ?>
    </ul>
    <div class="filter-container">
        <form class="filter-form" action="<?=Url::toRoute(['catalog/search'])?>" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="brand-filter">
                <h2 class="filter-title">Производители:</h2>
                <?php foreach($manufacturers as $manufacturer) {?>
                    <input type="checkbox" name="brand-<?=$manufacturer->id?>" id="choice-<?=$manufacturer->id?>">
                    <label for="choice-<?=$manufacturer->id?>"><?=$manufacturer->name?></label>
                <?php } ?>
            </div>
            <div class="group-filter">
                <h2 class="filter-title">Группы товаров:</h2>
                <input type="radio" name="category" value="0" id="radio-0" checked>
                <label for="radio-0">Все группы</label>
                <?php foreach($categories as $category) {?>
                    <?php
                        $checked = "";

                        if ($curCategory && $curCategory->id == $category->id) {
                            $checked = "checked";
                        }
                    ?>
                    <input type="radio" <?=$checked ?> name="category" value="<?=$category->id?>" id="radio-<?=$category->id?>">
                    <label for="radio-<?=$category->id?>"><?=$category->name?></label>
                <?php } ?>
            </div>
            <button class="btn" type="submit">Показать</button>
        </form>
    </div>
    <div class="item-container">
        <div class="item-block clearfix">
            <?php foreach($products as $product) {?>
                <article class="item">
                    <div class="item-photo">
                        <a href="<?=$product->getProductUrl()?>">
                            <img src="/img/item-1.jpg" width="220" height="165" alt="<?=$product->name?>">
                        </a>
                    </div>
                    <div class="item-title">
                        <a href="<?=$product->getProductUrl()?>"><?=$product->name?></a>
                    </div>
                    <div class="item-buy">
                        <div class="item-price"><?=$product->price?> руб.</div>
                        <a class="btn" href="<?=$product->getProductUrl()?>">Купить</a>
                    </div>
                </article>
            <?php } ?>
        </div>

        <?php
            echo CatalogPager::widget([
                'pagination' => $pages,
                'linkOptions' => ['class' => 'btn']
            ]);
        ?>
    </div>
</main>
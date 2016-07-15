<?php

/* @var $this yii\web\View */

use app\widgets\catalogpager\CatalogPager;
use app\widgets\CatalogFilter\CatalogFilter;
use yii\helpers\Url;


// Title для конкретной категории, если она существует
if($curCategory) {
    $this->title = $curCategory->name;
} else {
    $this->title = 'Каталог';
}

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
    <?=CatalogFilter::widget([
        'manufacturersId' => $manufacturersId,
        'curCategory' => $curCategory
    ])?>
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
                        <a class="btn btn-to-cart" data-id="<?=$product->id?>" href="<?=Url::to(['cart/add','id' => $product->id])?>">Купить</a>
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
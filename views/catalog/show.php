<?php

/* @var $this yii\web\View */

$this->title = $product->name;

?>

<main class="container container-item clearfix">
    <h1 class="index-title"><?=$product->name?></h1>
    <ul class="breadcrumbs">
        <li>
            <a href="/">Главная</a>
        </li>
        <li>
            <a href="/catalog/<?=$category->slug?>"><?=$category->name?></a>
        </li>
        <li class="active">
            <?=$product->name?>
        </li>
    </ul>
    <div class="gallery-container">
        <div class="main-photo">
            <img src="/img/item-photo-1.jpg" width="460" height="498" alt="<?=$product->name?>">
        </div>
        <ul class="gallery-photo clearfix">
            <li>
                <a href="#">
                    <img src="/img/item-photo-2.jpg" width="140" height="149" alt="<?=$product->name?>">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/item-photo-3.jpg" width="140" height="149" alt="<?=$product->name?>">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/item-photo-4.jpg" width="140" height="149" alt="<?=$product->name?>">
                </a>
            </li>
        </ul>
    </div>
    <div class="description-container">
        <div class="item-code clearfix">
            <div class="left">
                <?php if($product->available) {?>
                    Есть в наличии
                <?php } else { ?>
                    Нет в наличии
                <?php }?>
            </div>
            <div class="right">
                Артикул: <?=$product->sku?>
            </div>
        </div>
        <section class="item-about">
            <?=$product->description?>
        </section>
        <div class="item-buy">
            <div class="item-price"><?=$product->price?> руб.</div>
            <a class="btn" href="#">Купить</a>
        </div>
        <section class="item-about">
            <b>В набор входят:</b>
            <ul class="style-rhombus">
                <li>
                    Средство для умывания (50 мл)
                </li>
                <li>
                    Увлажняющий крем (50 мл)
                </li>
                <li>
                    Крем для бритья (50 мл)
                </li>
                <li>
                    Крем после бритья, шампунь (50 мл)
                </li>
                <li>
                    Удобная кожаная косметичка
                </li>
            </ul>
        </section>
    </div>
</main>

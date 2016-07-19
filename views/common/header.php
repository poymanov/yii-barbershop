<?php
use yii\helpers\Url;
?>

<header class="main-header">
    <div class="container clearfix">
        <?php if(!isset($this->params['IsMain'])) {?>
            <div class="icon-logo">
                <a href="/">
                    <img src="/img/icon-logo.png" width="111" height="24" alt="Barbershop">
                </a>
            </div>
        <?php } ?>
        <nav class="main-navigation">
            <ul>
                <li>
                    <a href="#">Информация</a>
                </li>
                <li>
                    <a href="#">Новости</a>
                </li>
                <li>
                    <a href="<?=Url::toRoute(['site/price'])?>">Прайс-лист</a>
                </li>
                <li>
                    <a href="<?=Url::toRoute(['catalog/index'])?>">Магазин</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>
        </nav>
        <div class="user-block">
            <?php if (Yii::$app->user->identity) {?>
                <a class="logout" href="<?=Url::to(['/profile'])?>">Профиль</a>
                <a class="logout" href="<?=Url::to(['site/logout'])?>">Выход</a>
            <?php } else {?>
                <a class="login" href="<?=Url::to(['site/login'])?>">Вход</a>
            <?php } ?>
        </div>

        <?php if (!Yii::$app->user->identity) {?>
            <div class="user-block">
                <a class="signup" href="<?=Url::to(['site/signup'])?>">Регистрация</a>
            </div>
        <?php } ?>

        <div class="user-block">
            <a class="cart-link" href="<?=Url::to(['/cart'])?>">Корзина</a>
        </div>
    </div>
</header>
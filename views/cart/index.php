<?php

use yii\helpers\Url;

$this->title = 'Корзина';

?>

<main class="container container-catalog clearfix">
    <h1 class="index-title">Корзина</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="<?=Url::home()?>">Главная</a>
        </li>
        <li>
            Корзина
        </li>
    </ul>

    <?php if($cart) {?>
        <div class="inner-columns">
            <table class="cart-table">
                <tr>
                    <td>id</td>
                    <td>Наименование</td>
                    <td>Кол-во</td>
                    <td>Цена</td>
                    <td>Сумма</td>
                    <td></td>
                </tr>

                <?php
                    // переменные для подсчета общего количества товаров и итоговой суммы
                    $commonQty = 0;
                    $commonSum = 0;
                ?>

                <?php foreach ($cart as $id => $item) {?>
                    <?php
                        $commonQty += $item['qty'];

                        $productSum = $item['qty'] * $item['price'];

                        $commonSum += $productSum;

                    ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$item['name']?></td>
                        <td>
                            <input data-id="<?=$id?>" class="cart-input" type="text" value="<?=$item['qty']?>">

                        </td>
                        <td><?=$item['price']?></td>
                        <td><?=$productSum?></td>
                        <td>
                            <a class="btn btn-cart-remove" data-id="<?=$id?>" href="<?=Url::to(['cart/remove','id' => $id])?>">Удалить</a>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$commonQty?></td>
                    <td></td>
                    <td><?=$commonSum?></td>
                    <td><a class="btn" href="<?=Url::to(['cart/clear'])?>">Очистить</a></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>
                        <a class="btn" href="<?=Url::to(['cart/checkout'])?>">Оформить заказ</a>
                    </td>
                </tr>
            </table>
        </div>
    <?php } else {?>
        <?php
            if (Yii::$app->session->hasFlash('successCart')) {
                echo "<h2>" . Yii::$app->session->getFlash('successCart') . "</h2>";
            } else {
                echo "<h2>Товары отсутствуют</h2>";
            }
        ?>
    <?php } ?>
</main>

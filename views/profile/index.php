<?php

use yii\helpers\Url;

$this->title = 'Профиль';

?>

<main class="container container-catalog clearfix">
    <h1 class="index-title">Профиль</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="<?=Url::home()?>">Главная</a>
        </li>
        <li>
            Профиль
        </li>
    </ul>

    <div class="filter-container">
        <h2 class="filter-title">Меню:</h2>
        <ul>
            <li>
                <a href="<?=Url::to(['/profile'])?>">Заказы</a>
            </li>
        </ul>
    </div>

    <div class="item-container">
        <?php if($orders) {?>
            <div class="inner-columns inner-columns--margin">
                <table class="cart-table">
                    <tr>
                        <td>id</td>
                        <td>Сумма заказа</td>
                    </tr>

                    <?php foreach ($orders as $order) {?>
                        <tr>
                            <td>
                                <a href="<?=Url::to(['/profile/order','id' => $order->id])?>">
                                    <?=$order->id?>
                                </a>
                            </td>
                            <td>
                                <?php
                                $total = 0;

                                foreach ($order->ordersItems as $item) {
                                    $total += $item->price;
                                }

                                echo $total;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else {?>
            <?php
            echo "<h2>Заказы отсутствуют</h2>";
            ?>
        <?php } ?>
    </div>
    
</main>


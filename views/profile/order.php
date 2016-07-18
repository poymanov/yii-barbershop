<?php

use yii\helpers\Url;

$this->title = 'Заказ ' . $order->id;

?>

<main class="container container-catalog clearfix">
    <h1 class="index-title">Профиль</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="<?=Url::home()?>">Главная</a>
        </li>
        <li>
            <a href="<?=Url::to(['/profile'])?>">Главная</a>
        </li>
        <li>
            Заказ # <?=$order->id?>
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
        <?php if($order) {?>
            <div class="inner-columns inner-columns--margin">
                <?php if ($order->ordersItems) {?>
                <table class="cart-table">
                    <tr>
                        <td>id</td>
                        <td>Товар</td>
                        <td>Количество</td>
                        <td>Цена</td>
                        <td>Сумма</td>
                    </tr>
                        <?php
                            $total = 0;
                        ?>
                        <?php foreach ($order->ordersItems as $item) {?>
                            <tr>
                                <td>
                                    <?=$item->id?>
                                </td>
                                <td>
                                    <?=$item->product_id?>
                                </td>
                                <td>
                                    <?=$item->qty?>
                                </td>
                                <td>
                                    <?=$item->price?>
                                </td>
                                <td>
                                    <?php

                                    $sum = $item->qty * $item->price;

                                    echo $sum;

                                    $total += $sum;

                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4"></td>
                            <td><?=$total?></td>
                        </tr>
                <?php } else {?>
                    <h2>В заказе отсутстуют товары :(</h2>
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
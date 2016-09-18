<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = "Заказ #" .$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Пользователь',
                'value' => $model->user->username,
            ],
        ],
    ]) ?>

    <h3>Состав заказа</h3>

    <?php if ($items) {?>

        <table class="table table-striped table-bordered detail-view">
            <tr>
                <th>#</th>
                <th>Товар</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>

            <?php
                $total = 0;
            ?>

            <?php foreach ($items as $item) {?>

                <tr>
                    <td><?=$item->id?></td>
                    <td><?=$item->product->name?></td>
                    <td><?=$item->qty?></td>
                    <td><?=$item->price?></td>
                    <td>
                        <?php

                            $sum = $item->qty * $item->price;
                            $total += $sum;

                            echo $sum;

                        ?>
                    </td>
                </tr>
            <?php }?>
            <tr>
                <td colspan="4"></td>
                <td><?=$total?></td>
            </tr>
        </table>

    <?php }?>

</div>

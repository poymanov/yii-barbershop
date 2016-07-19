<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<h2 class="filter-title">Меню:</h2>
<ul>
    <li>
        <?=Html::a('Заказы', Url::to(['/profile']))?>
    </li>
    <li>
        <?=Html::a('Информация', Url::to(['/profile/info']))?>
    </li>
</ul>

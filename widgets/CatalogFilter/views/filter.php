<?php

use yii\helpers\Url;

?>

<div class="filter-container">
        <form class="filter-form" action="<?=Url::toRoute(['catalog/search'])?>" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="brand-filter">
                <h2 class="filter-title">Производители:</h2>
                <?php foreach($manufacturers as $manufacturer) {?>
    <?php
    // Выделение выбранных пунктов производителей
    $checked = "";

    if ($manufacturersId && array_search($manufacturer->id,$manufacturersId) !== false) {
        $checked = "checked";
    }
    ?>
    <input type="checkbox" <?=$checked ?> name="man-<?=$manufacturer->id?>" id="choice-<?=$manufacturer->id?>">
    <label for="choice-<?=$manufacturer->id?>"><?=$manufacturer->name?></label>
<?php } ?>
</div>
<div class="group-filter">
    <h2 class="filter-title">Группы товаров:</h2>
    <input type="radio" name="category" value="0" id="radio-0" checked>
    <label for="radio-0">Все группы</label>
    <?php foreach($categories as $category) {?>
        <?php
        // Выделение текущей группы товаров
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
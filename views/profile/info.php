<?php

use app\widgets\ProfileMenu\ProfileMenu;
use yii\helpers\Url;
use app\models\EditInfoForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use Yii;

$this->title = "Изменение личных данных";

?>

<main class="container container-catalog clearfix">
    <h1 class="index-title">Профиль</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="<?=Url::home()?>">Главная</a>
        </li>
        <li>
            Измененить личные данные
        </li>
    </ul>

    <div class="filter-container">
        <?=ProfileMenu::widget()?>
    </div>

    <div class="item-container">

        <?php

            if (Yii::$app->session->hasFlash('error')) {
                echo "<p class='error'>" . Yii::$app->session->getFlash('error') . "</p>";
            }

        ?>

        <?php

        if (Yii::$app->session->hasFlash('success')) {
            echo "<p class='success'>" . Yii::$app->session->getFlash('success') . "</p>";
        }

        ?>

        <?php
            $form = ActiveForm::begin(['options' => [
                'class' => 'edit-info-form'
            ]]);
        ?>

        <?=$form->field($model, 'username')->textInput() ?>
        <?=$form->field($model, 'email')->textInput() ?>
        <?=$form->field($model, 'oldPassword')->passwordInput() ?>
        <?=$form->field($model, 'newPassword')->passwordInput() ?>
        <?=$form->field($model, 'newPasswordRepeat')->passwordInput() ?>
        <?=Html::submitButton('Изменить данные') ?>
        <?php ActiveForm::end(); ?>

        ?>
    </div>

</main>
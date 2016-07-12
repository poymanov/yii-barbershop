<?php

use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php

$model = new LoginForm();

?>

<div class="modal-user modal-login">
    <button class="modal-close" type="button" title="Закрыть"></button>
    <h2>Личный кабинет</h2>
    <p>
Введите пожалуйста свой логин и пароль
</p>

    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => [
                'class' => 'modal-form'
            ],
            'enableClientValidation' => false,
            'action' => \yii\helpers\Url::to(['site/login']),
            'validateOnSubmit' => false
        ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['class' => 'icon-user', 'placeholder' => 'Логин'])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'icon-password', 'placeholder' => 'Пароль'])->label(false) ?>
    <?= $form->field($model, 'rememberMe')->checkbox(['id' => 'remember'])->label('Запомните меня',['class' => 'remember-checked']) ?>
    <a class="forget-password" href="#">Я забыл пароль!</a>
    <?= Html::submitButton('Войти', ['class' => 'btn']) ?>
    <?php ActiveForm::end(); ?>

</div>
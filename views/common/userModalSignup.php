<?php

use app\models\SignupForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php

$model = new SignupForm();

?>

<div class="modal-user modal-signup">
    <button class="modal-close" type="button" title="Закрыть"></button>
    <h2>Регистрация</h2>

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'options' => [
            'class' => 'modal-form'
        ],
        'enableClientValidation' => false,
        'action' => \yii\helpers\Url::to(['site/signup']),
        'validateOnSubmit' => false
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['class' => 'icon-user', 'placeholder' => 'Логин'])->label(false) ?>
    <?= $form->field($model, 'email')->textInput(['class' => 'icon-user', 'placeholder' => 'Email'])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'icon-password', 'placeholder' => 'Пароль'])->label(false) ?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn']) ?>
    <?php ActiveForm::end(); ?>

</div>


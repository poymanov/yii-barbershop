<?php

use app\models\SignupForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\PasswordResetRequestForm;
?>

<?php

$model = new PasswordResetRequestForm();

?>

<div class="modal-user modal-password-request">
    <button class="modal-close" type="button" title="Закрыть"></button>
    <h2>Восстановление пароля по e-mail</h2>

    <?php $form = ActiveForm::begin([
        'id' => 'password-request-form',
        'options' => [
            'class' => 'modal-form'
        ],
        'enableClientValidation' => false,
        'action' => \yii\helpers\Url::to(['site/password-reset-request']),
        'validateOnSubmit' => false
    ]);
    ?>
    <?= $form->field($model, 'email')->textInput(['class' => 'icon-user', 'placeholder' => 'Email'])->label(false) ?>
    <?= Html::submitButton('Отправить ссылку', ['class' => 'btn']) ?>
    <?php ActiveForm::end(); ?>

</div>


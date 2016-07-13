<?php

use yii\helpers\Html;

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/email-confirm', 'token' => $user->email_confirm_token]);
?>

Здравствуйте, <?= Html::encode($user->username) ?>!

Для подтверждения адреса пройдите по ссылке:

<?= Html::a(Html::encode($confirmLink), $confirmLink) ?>

Если Вы не регистрировались у на нашем сайте, то просто удалите это письмо.
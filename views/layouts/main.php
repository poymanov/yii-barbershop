<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - Барбершоп Бородинский</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo \Yii::$app->view->renderFile('@app/views/common/header.php'); ?>
<?= $content ?>
<?php echo \Yii::$app->view->renderFile('@app/views/common/footer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

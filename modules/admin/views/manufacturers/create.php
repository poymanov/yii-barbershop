<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Manufacturers */

$this->title = 'Create Manufacturers';
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

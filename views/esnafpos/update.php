<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esnafpos */

$this->title = 'Update Esnafpos: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Esnafpos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esnafpos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

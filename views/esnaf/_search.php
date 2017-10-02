<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EsnafSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esnaf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'VERGI_NO') ?>

    <?= $form->field($model, 'AD') ?>

    <?= $form->field($model, 'ADRESS') ?>

    <?= $form->field($model, 'BOLGE_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

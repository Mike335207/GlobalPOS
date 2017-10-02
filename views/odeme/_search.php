<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OdemeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odeme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'POS_ID') ?>

    <?= $form->field($model, 'KART_ID') ?>

    <?= $form->field($model, 'TARIH') ?>

    <?= $form->field($model, 'TUTAR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

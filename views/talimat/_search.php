<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TalimatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talimat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TARIH') ?>

    <?= $form->field($model, 'TALIMAT_TARIH') ?>

    <?= $form->field($model, 'TUTAR') ?>

    <?= $form->field($model, 'KULLANICI_ID') ?>

    <?php // echo $form->field($model, 'ACIKLAMA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

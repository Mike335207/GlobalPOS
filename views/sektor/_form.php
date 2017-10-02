<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sektor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SECTOR_NAME')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

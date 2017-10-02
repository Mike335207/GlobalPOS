<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Bolge;
use app\models\Sektor;

/* @var $this yii\web\View */
/* @var $model app\models\Esnaf */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esnaf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VERGI_NO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ADRESS')->textInput(['maxlength' => true]) ?>
	

     <?= $form->field($model, 'BOLGE_ID')->dropDownList(
		ArrayHelper::map(Bolge::find()->all(), 'BOLGE_ID', 'BOLGE_ADI'), 
		['prompt' => 'Bolge Seciniz']
	
	) ?>
	
	  <?php
		$form->field($model, 'SECTOR_ID')->dropDownList(
		ArrayHelper::map(Sektor::find()->all(), 'ID', 'SECTOR_NAME'), 
		['prompt' => 'Sektor Seciniz']
	
	) ?>
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Guncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Bolge;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Vatandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vatandas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TC_NO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SOYAD')->textInput(['maxlength' => true]) ?>
	

    <?= $form->field($model, 'DOGUM_TARIHI')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd'
        ]
	]);?>
	
	 <?= $form->field($model, 'BOLGE_ID')->dropDownList(
		ArrayHelper::map(Bolge::find()->all(), 'BOLGE_ID', 'BOLGE_ADI'), 
		['prompt' => 'Bolge Seciniz']
	
	) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Guncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

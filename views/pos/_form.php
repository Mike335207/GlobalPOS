<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Bolge;

/* @var $this yii\web\View */
/* @var $model app\models\Pos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'POS_ID')->textInput(['maxlength' => true])  ?>

     <?= $form->field($model, 'BOLGE_ID')->dropDownList(
		ArrayHelper::map(Bolge::find()->all(), 'BOLGE_ID', 'BOLGE_ADI'), 
		['prompt' => 'Bölge Seçiniz']
	
	) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

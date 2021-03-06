<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Bolge;

/* @var $this yii\web\View */
/* @var $model app\models\Kart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KART_NO')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'BOLGE_ID')->dropDownList(
		ArrayHelper::map(Bolge::find()->all(), 'BOLGE_ID', 'BOLGE_ADI'), 
		['prompt' => 'Select bolge']
	
	) ?>

    <?= $form->field($model, 'TIP')->dropDownList([ 'Manyetik Kart' => 'Manyetik Kart', 'Çipli Kart' => 'Çipli Kart', '' => '', ], ['prompt' => 'Select cart type']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Esnaf;
use app\models\Pos;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Esnafpos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esnafpos-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?=$form->field($model, 'ESNAF_ID')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Esnaf::find()->all(), 'ID', 'AD'),
		'language' => 'tr',
		'options' => ['placeholder' => 'Esnaf Seçiniz...'],
		'pluginOptions' => [
		'allowClear' => true
		],
	]);
	?>	
	
	<?=$form->field($model, 'POS_ID')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Pos::find()->all(), 'ID', 'POS_ID'),
		'language' => 'tr',
		'options' => ['placeholder' => 'POS Seçiniz...'],
		'pluginOptions' => [
		'allowClear' => true
		],
	]);
	?>	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

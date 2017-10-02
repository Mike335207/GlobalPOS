<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kart;
use app\models\Vatandas;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\models\Vatandaskart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vatandaskart-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?=$form->field($model, 'KART_ID')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Kart::find()->all(), 'ID', 'KART_NO'),
		'language' => 'tr',
		'options' => ['placeholder' => 'Kart Seçiniz...'],
		'pluginOptions' => [
		'allowClear' => true
		],
	]);
	?>	
	
	<?=$form->field($model, 'VATANDAS_ID')->widget(Select2::classname(), [
		'data' =>ArrayHelper::map(Vatandas::find()->all(), 'ID', 'vatandasName'), 
		'language' => 'tr',
		'options' => ['placeholder' => 'Vatandaş Seçiniz ...'],
		'pluginOptions' => [
		'allowClear' => true
		],
	]);
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ekle' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

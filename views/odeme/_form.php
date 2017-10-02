<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

use yii\helpers\ArrayHelper;
use app\models\Kart;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Odeme */
/* @var $form yii\widgets\ActiveForm */

if (!$model->TARIH) $model->TARIH = date('yyyy-mm-dd');
if (!$model->POS_ID) $model->POS_ID = 0;

?>

<div class="odeme-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'POS_ID')->textInput() ?-->

    <!--?= $form->field($model, 'KART_ID')->textInput() ?-->
	
	<?=$form->field($model, 'KART_ID')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Kart::find()->all(), 'ID', 'KART_NO'),
		'language' => 'tr',
		'options' => ['placeholder' => 'Kart Numarası Giriniz...'],
		'pluginOptions' => [
		'allowClear' => true
		],
	]);  ?>
	
	
	<?php
	
	    if (empty($model->TARIH))
	    {
	     echo  $form->field($model, 'TARIH')->widget(DatePicker::className(), [
	    'inline' => false, 
	    'language' => 'tr',
	    //'disabled' => !empty($model->TARIH),
	    'clientOptions' => [
		'autoclose' => true,
		'format' => 'yyyy-mm-dd',
    		],
 	    'clientEvents' => [
            	//'changeDate' => false,
        	],
	    'options' => [
		    //'readonly' => true,
        	]
		]);
	} else
	{
		echo Html::activeHiddenInput($model, 'TARIH', ['value'=>date('Y-m-d')]);
		
	}
	?>

    <?= $form->field($model, 'TUTAR')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Yükle' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

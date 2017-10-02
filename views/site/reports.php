<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

if (!$model->paramStartDate) $model->paramStartDate = date('Y-m-d');
if (!$model->paramFinishDate) $model->paramFinishDate = date('Y-m-d');

$form = ActiveForm::begin([
    'id' => 'reports-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>


<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Raporlama</h3>
				</div>
                <div class="bolge-create">
                <div class="box-body">
   					
					 <?= $form->field($model, 'paramStartDate')->widget(DatePicker::className(), [
						// inline too, not bad
						 'inline' => false, 
						 // modify template for custom rendering
						//'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd',
								'language' => 'tr-TR',
						]
					]);?>
	
					<?= $form->field($model, 'paramFinishDate')->widget(
					DatePicker::className(), [
						// inline too, not bad
						'name' => 'paramFinishDate',	
						 'inline' => false,
					 
						 // modify template for custom rendering
						//'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd'
						]
					]);?>

					<?= $form->field($model, 'reportType')->radioList([
						1 => 'Coğrafi Bölge Bazında Raporlama', 
						2 => 'Sektörel Bazda Raporlama',
						3 => 'Esnaf Raporu'
					]); ?> 

	<!--?= $form->field($model, 'reportType')->radio(['label' => 'Coğrafi Bölge Bazında Raporlama', 'value' => 1, 'uncheck' => null]) ?-->
	<!--?= $form->field($model, 'reportType')->radio(['label' => 'Sektörel Bazda Raporlama', 'value' => 2, 'uncheck' => null]) ?-->
	<!--?= $form->field($model, 'reportType')->radio(['label' => 'Esnaf Raporu', 'value' => 3, 'uncheck' => null]) ?-->

					<div class="form-group">
						<div class="col-lg-offset-1 col-lg-11">
							<?= Html::submitButton('Run', ['class' => 'btn btn-primary']) ?>
						</div>
					</div>
					<?php ActiveForm::end() ?>
                </div>
                </div>
			</div>
		</div>
	</div>
</section>
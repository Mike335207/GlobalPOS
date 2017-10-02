<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Talimat */
/* @var $form yii\widgets\ActiveForm */

if (!$model->TARIH) $model->TARIH = date('Y-m-d');
if (!$model->TALIMAT_TARIH) $model->TALIMAT_TARIH = date('Y-m-d');
$model->KULLANICI_ID = Yii::$app->user->id;

?>
<section class="content">
	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
        <div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#tab_1" data-toggle="tab">Talimat Bilgisi</a></li>
				  <li><a href="#tab_2" data-toggle="tab">Talimat Detayları</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
					<p><b>Talimat Bilgilerini Giriniz:</b></p>
						
						<?=$form->field($model, 'TALIMAT_TARIH')->widget(DatePicker::className(), [
							'inline' => false, 
							'language' => 'tr',
							'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd',
								],
							]); ?>

						<?= $form->field($model, 'TUTAR')->textInput(['maxlength' => true]) ?>

						<!--?= $form->field($model, 'KULLANICI_ID')->textInput() ?-->
						<?= Html::activeHiddenInput($model, 'KULLANICI_ID', ['value'=>Yii::$app->user->id])?>

						<?= $form->field($model, 'ACIKLAMA')->textInput(['maxlength' => true]) ?>
						
						<?= Html::activeHiddenInput($model, 'TARIH', ['value'=>date('Y-m-d')])?>
						
						<p>
						<div class="callout callout-info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Kart Seçmeyi Unutmayın!</h4>
							Talimat detayları sekmesinde, yükleme yapılacak kartlarınızı seçiniz.
						</div>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2">
						<div class="form-group">
							<label>Kart(lar) Seçimleri:</label>
							<p>
							<?php
								if($model->isNewRecord)
								{
									echo  GridView::widget
												([
													'dataProvider' => $dataProviderOdeme,
													'columns' => 
												[
												['class' => 'yii\grid\SerialColumn'],
												['class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function ($model, $key, $index, $column) {
														return ['value' => $model->KART_ID];
													}
												],
												'kART.KART_NO',
												'vATANDAS.vatandasName'
													],
												]); 
								} else
								{
									 echo GridView::widget
											([
												'dataProvider' => $dataProviderOdeme,
												'columns' => 
											[
											['class' => 'yii\grid\SerialColumn'],
											'kart.KART_NO',
											'vatandas.vatandasName',
											//'TARIH',
											//'TUTAR'
												],
											]); 
								}
							?> 	
							<?= Html::submitButton($model->isNewRecord ? 'Kaydet' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary pull-right']) ?>

							
							<p>
							
						</div>
					</div>
				</div>
            <!-- /.tab-content -->
			</div>
		</div>
    </div>
	<?php ActiveForm::end(); ?>
</section>

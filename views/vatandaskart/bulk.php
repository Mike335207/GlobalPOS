<!-- Content Header (Page header) -->

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Toplu Yükleme İşlemi';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				</div>
				
				<?php if (Yii::$app->session->hasFlash('error')): ?>
					  <div class="alert alert-error alert-dismissable">
					  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					  <h4><i class="icon fa fa-ban"></i>ERROR!!!</h4>
					  <?= Yii::$app->session->getFlash('error') ?>
					  </div>
				<?php endif; ?>
				
				<div class="kart-index">
                	<div class="box-body">
		<?=Html::beginForm(['groupaccrual'],'post');?>
		<?=Html::textinput('amount', '200.00')?>
		<?=Html::submitButton('Yukle', ['class' => 'btn btn-info',]);?>
                <?= GridView::widget
					([
                        'dataProvider' => $dataProvider,
			//'rowOptions' => function ($model, $key, $index, $grid) {
			//		return [/*'data-id' => $model->ID*/];
			//		},
                        'columns' => 
			[
                        // ['class' => 'yii\grid\CheckboxColumn'],
			['class' => 'yii\grid\SerialColumn'],
			   ['class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function ($model, $key, $index, $column) {
    return ['value' => $model->KART_ID];
}
      			],
			
					//'ID',                            		
					//'KART_ID',
					//'VATANDAS_ID',
					'kART.KART_NO',
					'vATANDAS.vatandasName'
                       	],
                    ]); 
					?> 
                    </div> <!-- div class="box-body" -->
                </div> <!-- div class="kart-index" -->
			</div> <!-- div class="box box-primary" -->
		</div> <!-- div class="col-xs-12" -->
	</div> <!-- div class="row" -->
</section>

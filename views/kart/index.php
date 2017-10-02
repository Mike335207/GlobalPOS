<!-- Content Header (Page header) -->

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kart Bilgileri';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Header (Page header) -->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					
    				<?php
					if (Yii::$app->user->can('create-card'))					
						echo Html::a('+ Yeni Kart Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
				
				<?php if (Yii::$app->session->hasFlash('error')): ?>
					  <div class="alert alert-error alert-dismissable">
					  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					  <h4><i class="icon fa fa-ban"></i> UYARI!!!</h4>
					  <?= Yii::$app->session->getFlash('error') ?>
					  </div>
				<?php endif; ?>
				
				<div class="kart-index">
                	<div class="box-body">
					<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget
					([
                        'dataProvider' => $dataProvider,
                        'columns' => 
						[
                            ['class' => 'yii\grid\SerialColumn'],
							'TIP',
							//'bOLGE.BOLGE_ADI',
                            'KART_NO',
							'vatandas.vatandasName',
							//'balance',
							[
								'attribute' => 'balance',
								'format' => ['decimal', 2],
								//'label' => 'Name',
							],
                            				[
								'class' => 'yii\grid\ActionColumn',
								'contentOptions' => ['style' => 'width: 9.0%'],
								'visibleButtons' => [
									'view' => true,
									'update' => \Yii::$app->user->can('update-card'),
									'delete' => \Yii::$app->user->can('delete-card'),
								],
							],
                       	],
                    ]); 
					?> 
                    </div> <!-- div class="box-body" -->
                </div> <!-- div class="kart-index" -->
			</div> <!-- div class="box box-primary" -->
		</div> <!-- div class="col-xs-12" -->
	</div> <!-- div class="row" -->
</section>

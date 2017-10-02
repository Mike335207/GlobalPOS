<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OdemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kart/Ödeme Hareketleri';
$this->params['breadcrumbs'][] = $this->title;
?>



<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					
    				<?php
					if (Yii::$app->user->can('create-odeme'))
					echo  Html::a('+ Yeni Ödeme Ekle', ['create'], ['class' => 'btn-sm btn-success']) 
				?>
				</div>
				<div class="kart-index">
                	<div class="box-body">
					<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget
					([
                        'dataProvider' => $dataProvider,
                        'columns' => 
						[
                            ['class' => 'yii\grid\SerialColumn'],
							
							'TARIH',
							'vatandas.vatandasName',
							'kart.KART_NO',
							//'POS_ID',
							'pos.POS_ID',
							//'KART_ID',
							'esnaf.AD',
							
							'TUTAR',
							
                            				[
								'class' => 'yii\grid\ActionColumn',
								'contentOptions' => ['style' => 'width: 9.0%'],
								'visibleButtons' => [
									'view' => true,
									'update' => \Yii::$app->user->can('update-odeme'),
									'delete' => \Yii::$app->user->can('delete-odeme'),
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

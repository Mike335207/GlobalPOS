<!-- Content Header (Page header) -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos Cihazi Bilgileri';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                        <?php
				if (Yii::$app->user->can('create-pos'))				
					echo  Html::a('+ Yeni Pos Cihazi Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
				<div class="pos-index">
                    <div class="box-body">
						<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                    
                                'POS_ID',
                                'bOLGE.BOLGE_ADI',
								'esnaf.AD',
								'esnaf.sECTOR.SECTOR_NAME',
                    
                               				[
								'class' => 'yii\grid\ActionColumn',
								'contentOptions' => ['style' => 'width: 9.0%'],
								'visibleButtons' => [
									'view' => true,
									'update' => \Yii::$app->user->can('update-pos'),
									'delete' => \Yii::$app->user->can('delete-pos'),
								],
							],
                            ],
                        ]); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

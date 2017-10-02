<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TalimatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yükleme Talimatları';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('js/main.js',['depends' => 'yii\web\YiiAsset' ]);
?>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                    <!--?= Html::a('+ Yeni Talimat Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?-->
					<?= Html::button('+ Yeni Talimat Ekle', ['value'=> Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']) ; ?>
				</div>
				
				<?php
						Modal::begin([
							'header' => '<h4>Yükleme Talimatı Bilgileri</h4>',
							'id' => 'modal_',
							'size' => 'modal-lg',
						]);
						
						echo "<div id = 'modalContent'></div> ";
						Modal::end();
					?>
				
				<div class="talimat-index">
                    <div class="box-body">
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						//'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) {
								  return ['data-id' => $model->ID, 'data-value' => '/index.php?r=talimat%2Fview&id=',];
								  },
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							//'ID',
							'TARIH',
							'TALIMAT_TARIH',
							'TUTAR',
							//'ACIKLAMA',
							'ACIKLAMA',
							'kULLANICI.userName',
							[
									'class' => 'yii\grid\ActionColumn',
									'contentOptions' => ['style' => 'width: 9.0%'],
									'visibleButtons' => [
										'view' => true,
										'update' => true,
										'delete' => true,
									],
									
									 'buttons'=>[
										'view'=>function ($url, $model) {
											$t = 'index.php?r=talimat/view&id='.$model->ID;
											return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value'=>Url::to($t), 'class' => 'btn btn-default btn-xs custom_button']);
										},
										'update'=>function ($url, $model) {
											$t = 'index.php?r=talimat/update&id='.$model->ID;
											return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to($t), 'class' => 'btn btn-default btn-xs custom_button']);
										},
									],
									
									
								]
								
							],
						]
					); 
				?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

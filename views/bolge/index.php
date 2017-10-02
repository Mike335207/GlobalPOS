<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
        
        /* @var $this yii\web\View */
        /* @var $searchModel app\models\BolgeSearch */
        /* @var $dataProvider yii\data\ActiveDataProvider */
        
        
$this->title = 'Bolge Bilgileri';        
$this->params['breadcrumbs'][] = $this->title;
\Yii::$app->language = 'tr-TR';
$this->registerJsFile('js/main.js',['depends' => 'yii\web\YiiAsset' ]);
    ?>

<!-- Content Header (Page header) -->


<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				<?= Html::button('+ Yeni Bölge Ekle', ['value'=> Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']) ; ?>
                    <!-- ?= Html::a('+ Yeni Bölge Ekle', ['create'], ['class' => 'btn-sm btn-success']) ? -->
				</div>
				<?php
						Modal::begin([
							'header' => '<h4>Bölge Bilgileri</h4>',
							'id' => 'modal_',
							'size' => 'modal-lg',
						]);
						
						echo "<div id = 'modalContent'></div> ";
						Modal::end();
				?>
				<div class="bolge-index">
                    <div class="box-body">
                      <?= GridView::widget([
						'dataProvider' => $dataProvider,
						//'filterModel' => $searchModel,
						// 5. Burası eklenecek
						'rowOptions' => function ($model, $key, $index, $grid) {
								  return ['data-id' => $model->BOLGE_ID, 'data-value' => '/index.php?r=bolge%2Fview&id=',];
								  },
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							//'BOLGE_ID',
							'BOLGE_ADI',[
									'class' => 'yii\grid\ActionColumn',
									'contentOptions' => ['style' => 'width: 9.0%'],
									'visibleButtons' => [
										'view' => true,
										'update' => true,
										'delete' => true,
														],
									
									 'buttons'=>[
										'view'=>function ($url, $model) {
											$t = 'index.php?r=talimat/view&id='.$model->BOLGE_ID;
											return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value'=>Url::to($t), 'class' => 'btn btn-default btn-xs custom_button']);
										},
										'update'=>function ($url, $model) {
											$t = 'index.php?r=talimat/update&id='.$model->BOLGE_ID;
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
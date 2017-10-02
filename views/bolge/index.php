<!-- Content Header (Page header) -->
	<?php
        use yii\helpers\Html;
        use yii\grid\GridView;
        
        /* @var $this yii\web\View */
        /* @var $searchModel app\models\BolgeSearch */
        /* @var $dataProvider yii\data\ActiveDataProvider */
        
        
        $this->title = 'Bolge Bilgileri';
        
        $this->params['breadcrumbs'][] = $this->title;
        \Yii::$app->language = 'tr-TR';
    ?>

<!-- Content Header (Page header) -->


<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                    <?= Html::a('+ Yeni Bolge Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
				<div class="bolge-index">
                    <div class="box-body">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?= GridView::widget
							([
							'dataProvider' => $dataProvider,
							'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							//'BOLGE_ID',
							'BOLGE_ADI',
							['class' => 'yii\grid\ActionColumn'],
										  ],
							]); 
						?>
                        
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
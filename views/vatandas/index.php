<!-- Content Header (Page header) -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VatandasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vatandas Bilgileri';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Header (Page header) -->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                    <?= Html::a('+ Yeni Vatandas Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
                <div class="vatandas-index">
                    <div class="box-body">
						<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                    
                                //'ID',
                                'TC_NO',
                                'AD',
                                'SOYAD',
                                'DOGUM_TARIHI',
                                'bOLGE.BOLGE_ADI',
                    
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
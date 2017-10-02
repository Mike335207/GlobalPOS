<!-- Content Header (Page header) -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsnafSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esnaf Bilgileri';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                    <?= Html::a('+ Yeni Esnaf Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
                <div class="esnaf-index">
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                
                
                            'VERGI_NO',
                            'AD',
                            'ADRESS',
                            'bOLGE.BOLGE_ADI',
							'sECTOR.SECTOR_NAME',
                
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                 </div>
                </div>
			</div>
		</div>
	</div>
</section>

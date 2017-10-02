<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SektorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sektörler';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
                        <?= Html::a('+ Yeni Sektör Ekle', ['create'], ['class' => 'btn-sm btn-success']) ?>
				</div>
				<div class="pos-index">
                    <div class="box-body">
						<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?= GridView::widget([
							'dataProvider' => $dataProvider,
							'filterModel' => $searchModel,
							'columns' => [
								['class' => 'yii\grid\SerialColumn'],

								'SECTOR_NAME',

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

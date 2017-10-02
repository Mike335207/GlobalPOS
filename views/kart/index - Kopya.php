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
					<h3 class="box-title">Kayitli Kartlariniz | </h3>
                    <h3 class="box-title" >
                    <?= Html::a('Yeni Kart Tanimla +', ['create'], ['class' => 'btn btn-xs bg-olive']) ?>
                    </h3>
                    <div align="right">
                    <?= Html::a('Yeni Kart Tanimla +', ['create'], ['class' => 'btn btn-xs bg-olive']) ?>
                    </div>
				</div>
				<div class="kart-index">
                	<div class="box-body">
					<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'KART_NO',
                            'bOLGE.BOLGE_ADI',
                            'TIP',
                            ['class' => 'yii\grid\ActionColumn'],
                       				 ],
                    	]); ?> 
                        
                    </div>
                </div>
			</div>
		</div>
	</div>
    <?= Html::a('Yeni Kart Tanimla', ['create'], ['class' => 'btn btn-success']) ?>
</section>
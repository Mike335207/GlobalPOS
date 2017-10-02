<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pos */

$this->title = $model->POS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pos Cihazi Bilgileri</h3>
            </div>
            <div class="box-body">
            			 <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'POS_ID',
            'bOLGE.BOLGE_ADI',
        ],
    ]) ?>
	<?php
	if (Yii::$app->user->can('create-pos') || Yii::$app->user->can('update-pos') || Yii::$app->user->can('delete-pos'))
    		echo '<p class="help-block">Yapmak istediginiz islemi seciniz:</p>';
	?>
    <p>
        <?php if (Yii::$app->user->can('update-pos')) 
		echo Html::a('Guncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->can('delete-pos')) 
		echo Html::a('Sil', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if (Yii::$app->user->can('create-pos')) 
		echo Html::a('+ Yeni Pos Cihazi Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
  </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Pos Cihazini Kullanan Esnaf Bilgisi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<?php
					if ($model->getEsnaf()->count() > 0)
				{
           		 	echo DetailView::widget
						([
                            'model' => $model,
                            'attributes' => [
                            	'esnaf.AD',
								'esnaf.VERGI_NO',
								'esnaf.bOLGE.BOLGE_ADI',
								'esnaf.sECTOR.SECTOR_NAME',
								'esnaf.ADRESS',
                            ],
                        ]); 
				} else
				{
					echo "Veri bulamadik <p>"; ;	
					echo Html::a('Add Esnaf', ['esnafpos/create', 'pos'=> $model->ID, 'esnaf' => ""], [ 'class' => 'btn btn-success']) ;
				}
				?>
            </div>
          </div>
        </div>
      </div>
    </section>







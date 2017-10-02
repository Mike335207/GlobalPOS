<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Esnaf */

$this->title = $model->AD;
$this->params['breadcrumbs'][] = ['label' => 'Kayýtlý Esnaflar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Esnaf Bilgileri</h3>
            </div>
            <div class="box-body">
            	<?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'ID',
                                'VERGI_NO',
                                'AD',
                                'ADRESS',
                                'bOLGE.BOLGE_ADI',
								'sECTOR.SECTOR_NAME',
                            ],
                        ]) ?>
                        <p class="help-block">Yapmak istediginiz islemi seciniz:</p>
                        <p>
                            <?= Html::a('Guncelle', ['update', 'ID' => $model->ID, 'VERGI_NO' => $model->VERGI_NO], ['class' => 'btn btn-primary']) 							?>
                            <?= Html::a('Sil', ['delete', 'ID' => $model->ID, 'VERGI_NO' => $model->VERGI_NO], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?= Html::a('+ Yeni Esnaf Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                         </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Esnafa Bagli Pos Cihazi Bilgisi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<?php 
				if ($model->getPos()->count() > 0)
				{
           		 	echo DetailView::widget
						([
                            'model' => $model,
                            'attributes' => [
                             'pos.POS_ID',
                            ],
                        ]); 
				} else
				{
					echo "Veri bulamadik <p>"; ;	
					echo Html::a('Add POS', ['esnafpos/create', 'pos'=>"", 'esnaf' => $model->ID], [ 'class' => 'btn btn-success']) ;
				}
				?>
            </div>
          </div>
        </div>
      </div>
    </section>
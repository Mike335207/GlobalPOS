<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vatandas */

$this->title = $model->AD;
$this->params['breadcrumbs'][] = ['label' => 'Vatandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Vatandas Bilgileri</h3>
            </div>
            <div class="box-body">
            			<?= DetailView::widget
						([
                            'model' => $model,
                            'attributes' => [
                                'ID',
                                'TC_NO',
                                'AD',
                                'SOYAD',
                                'DOGUM_TARIHI',
                                'bOLGE.BOLGE_ADI',
                            ],
                        ]) 
						?>
                        <p class="help-block">Yapmak istediginiz islemi seciniz:</p>
                        <p>
								<?= Html::a('Guncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Sil', ['delete', 'id' => $model->ID], 
								[
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                        'method' => 'post',
                                    ],
                                ]) 
								?>
                                <?= Html::a('+ Yeni Vatandas Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    					</p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Kullanilan Kartlar</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
				<?php 
				//if ($model->getPos()->count() > 0)
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
					echo Html::a('Add Kart', ['vatandaskart/create', 'kart'=>"", 'vatandas' => $model->ID], [ 'class' => 'btn btn-success']) ;
				}
						?>
            </div>
          </div>
        </div>
      </div>
    </section>
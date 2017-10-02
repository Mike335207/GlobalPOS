<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kart */

$this->title = 'Kart Numarasi: ' .  $model->KART_NO;
$this->params['breadcrumbs'][] = ['label' => 'Kart Bilgileri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kart Bilgileri</h3>
            </div>
            <div class="box-body">
            				<?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'KART_NO',
                                //'bOLGE.BOLGE_ADI',
                                'TIP',
								'balance',
                            ],
                        ]) ?>
                        <p class="help-block">Yapmak istediginiz islemi seciniz:</p>
                        <p>
                            <?= Html::a('Guncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Sil', ['delete', 'id' => $model->ID], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?= Html::a('+ Yeni Kart Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                        </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Karti Kullanan Vatandas Bilgisi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
          	<?php 
				if ($model->getVatandas()->count() > 0)
				{
					echo DetailView::widget([
								'model' => $model,
								'attributes' => [
								'vatandas.TC_NO',                        
								'vatandas.AD',
								'vatandas.SOYAD',
								'vatandas.bOLGE.BOLGE_ADI',
								],
							]);
				}
				else  { 
							echo "Kart Kullanimda Degildir.<p>";
							echo Html::a('+ Vatandas Ekle', ['vatandaskart/create', 'kart' => $model->ID,  'vatandas' =>""], [ 'class' => 'btn btn-success pull-right']) ;
				}
			?>
			      <h3 class="box-title">Karti Hareketleri</h3>
			          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
		  
		            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
			</div>
          </div>
		  
        </div>
      </div>
    </section>

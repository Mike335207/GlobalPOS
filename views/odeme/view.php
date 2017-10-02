<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Odeme */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Odemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odeme-view">

    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ödeme Detayları</h3>
            </div>
            <div class="box-body">
            				<?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
            'ID',
            'POS_ID',
            'KART_ID',
            'TARIH',
            'TUTAR',
                            ],
                        ]) ?>
                        <p>
                        <p>
                            <?php if (Yii::$app->user->can('delete-odeme'))
				 echo Html::a('Sil', ['delete', 'id' => $model->ID], [
                                'class' => 'btn btn-danger pull-right',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Kartın Kullanıldığı Pos Bilgileri</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
            Karti Kullanan Vatandas Bilgisi Bulunmamaktadir.
		 <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
		           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
            </div>
          </div>
        </div>
      </div>
    </section>




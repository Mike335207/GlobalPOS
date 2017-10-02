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
              <h3 class="box-title">Kart Bilgileri</h3>
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
            Karti Kullanan Vatandas Bilgisi Bulunmamaktadir.
            </div>
          </div>
        </div>
      </div>
    </section>




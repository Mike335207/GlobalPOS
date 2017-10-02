<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title ='Sektör Kodu: ' .   $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sektörler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <section class="content">
      <div class="row">
       <!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sektör Bilgileri</h3>
            </div>
            <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'SECTOR_NAME',
        ],
    ]) ?>
                        <p class="help-block">Yapmak istediginiz islemi seciniz:</p>
                        <p>
                            <?= Html::a('Güncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) 							?>
                            <?= Html::a('Sil', ['delete', 'id' => $model->ID], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?= Html::a('+ Yeni Sektör Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                         </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Sektöre Bağlı Firmalar</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
            Sektöre bağlı firma bulunmamaktadır.
            </div>
          </div>
        </div>
      </div>
    </section>

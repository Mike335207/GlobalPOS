<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kart */

$this->title = 'Kart Numarasi: ' .  $model->KART_NO;
$this->params['breadcrumbs'][] = ['label' => 'Kart Bilgileri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->reportStartDate = date('Y-m-d');
$model->reportFinDate = date('Y-m-d');
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
			<?php
			if (Yii::$app->user->can('create-card') || Yii::$app->user->can('update-card') || Yii::$app->user->can('delete-card'))
                        echo '<p class="help-block">Yapmak istediginiz islemi seciniz:</p>';
			?>
                        <p>
                            <?php if (Yii::$app->user->can('update-card'))
				echo Html::a('Guncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
                             <?php if (Yii::$app->user->can('delete-card'))
				echo Html::a('Sil', ['delete', 'id' => $model->ID], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                             <?php if (Yii::$app->user->can('create-card')) 
				echo Html::a('+ Yeni Kart Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                        </p>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Vatandas Bilgisi</a></li>
              <li><a href="#tab_2" data-toggle="tab">Hesap Ekstresi</a></li>

              <li class="pull-right"><a href="#" class="text-muted"></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <p><b>Karti Kullanan Vatandas Bilgisi:</b></p>

				<?php 
					if ($model->getVatandas()->count() > 0)
					{
						echo DetailView::widget([
									'model' => $model,
									'attributes' => [
									'vatandas.TC_NO',                        
									'vatandas.AD',
									'vatandas.SOYAD',
									'vatandas.DOGUM_TARIHI',
									'vatandas.bOLGE.BOLGE_ADI',
									],
								]);
					}
					else  { 
								echo "Kart Kullanimda Degildir.<p>";
								echo Html::a('+ Vatandas Ekle', ['vatandaskart/create', 'kart' => $model->ID,  'vatandas' =>""], [ 'class' => 'btn btn-success pull-right']) ;
					}
				?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               <div class="form-group">
                <label>Baslangic Tarihi:</label>
                 <div class="input-group date">
                  <!--<div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control pull-right" id="datepicker">-->
		<?= DatePicker::widget([
		    'name' => $model->reportStartDate,
		    'value' => date('Y-m-d'),
		    'template' => '{addon}{input}',
			'clientOptions' => [
			    'autoclose' => true,
			    'format' => 'yyyy-mm-dd'
			]
		]);?>
                 </div>
               </div>
			   <div class="form-group">
                <label>Bitis Tarihi:</label>
                <div class="input-group date">
                  <!--<div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">-->
		  
		<?= DatePicker::widget([
		    'name' => $model->reportFinDate,
		    'value' => date('Y-m-d'),
		    'template' => '{addon}{input}',
			'clientOptions' => [
			    'autoclose' => true,
			    'format' => 'yyyy-mm-dd'
			]
		]);?>
                </div>
				<div class="box-body">
					<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
						<!--i class="fa fa-download"></i> PDF Listele-->
						<?php 
					 	echo Html::a("PDF Listele",
						Url::toRoute(['reportico/mode/execute',
						    'project' => 'GlobalPOS', 
						    'new_reportico_window' => 1,
						    'report' => 'KartHareketleri',
										'target_format'=>'HTML',
										'MANUAL_KartNo'=>$model->ID,
										'MANUAL_DateRange_FROMDATE'=>'2017-01-01',
										'MANUAL_DateRange_TODATE'=>'2017-07-07']),
						array("target" => "_blank"), 
						['class' => 'btn btn-success pull-right']);

											?>    
					</button>
				 </div>
               </div>
              </div>
            </div>
            <!-- /.tab-content -->
        </div>
        </div>
      </div>
    </section>

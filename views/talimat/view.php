<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Talimat */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Talimats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('js/test.js',['depends' => 'yii\web\YiiAsset' ]);
?>
<section class="content">
	<div class="row">
        <div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#tab_1" data-toggle="tab">Talimat Bilgisi</a></li>
				  <li><a href="#tab_2" data-toggle="tab">Talimat Detayları</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
					<p><b>Talimatı Kaydeden Kullanıcı Bilgisi:</b></p>
						<?= DetailView::widget
							([
								'model' => $model,
								'attributes' => 
									[
										//'ID',
										'TARIH',
										'TALIMAT_TARIH',
										'TUTAR',
										'kULLANICI.userName',
										'ACIKLAMA',
									],
							]) 
						?>
						<p class="help-block">Yapmak istediğiniz işlemi seçiniz:</p>
						<p>
						<!--?= Html::a('Güncelle', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?-->
						<?php $t = 'index.php?r=talimat/update&id='.$model->ID;
						echo Html::button('Güncelle', ['value'=> Url::to($t), 'class' => 'btn btn-primary', 'id' => 'modalButton2']) ; ?>
						<?= Html::a('Sil', ['delete', 'id' => $model->ID], [
							'class' => 'btn btn-danger',
							'data' => [
							'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
							'method' => 'post',
							],]) 
						?>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2">
						<div class="form-group">
							<label>Talimatın Verildiği Kart(lar) Bilgileri:</label>
							<p>
							<?= GridView::widget
								([
								'dataProvider' => $dataProviderOdeme,
								'columns' => 
								[
								['class' => 'yii\grid\SerialColumn'],
								'kart.KART_NO',
								'vatandas.vatandasName',
								'TARIH',
								'TUTAR'
								],]); 
							?> 
						</div>
					</div>
				</div>
            <!-- /.tab-content -->
			</div>
		</div>
    </div>
</section>


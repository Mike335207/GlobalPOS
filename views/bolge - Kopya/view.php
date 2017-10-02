<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bolge */

$this->title = $model->BOLGE_ADI;
$this->params['breadcrumbs'][] = ['label' => 'Bolges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cografi Bolge Bilgileri</h3>
				</div>
                <div class="bolge-view">
                	<div class="box-body">
						<?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'BOLGE_ID',
                                'BOLGE_ADI',
                            ],
                        ]) ?>
                        <p class="help-block">Yapmak istediginiz islemi seciniz:</p>
                        <p>
                            <?= Html::a('Güncelle', ['update', 'id' => $model->BOLGE_ID], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Sil', ['delete', 'id' => $model->BOLGE_ID], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Bu kayidi silmek istediginizden emin misiniz?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            <?= Html::a('+ Yeni Bölge Ekle', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                        </p>
      				</div>
                </div>
			</div>
		</div>
	</div>
</section>

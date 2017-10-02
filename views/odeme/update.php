<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Odeme */

$this->title = 'Ödeme Bilgilerini Güncelle: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Odemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Ödeme Bilgileri</h3>
				</div>
				<div class="kart-update">
 					<div class="box-body">
						<?= $this->render('_form', ['model' => $model,]) ?>
                        <p class="help-block">Tamamlamak için güncelleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

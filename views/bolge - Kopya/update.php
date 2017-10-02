<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bolge */

$this->title = 'Cografi Bolge Guncelle: ' . $model->BOLGE_ADI;
$this->params['breadcrumbs'][] = ['label' => 'Bolges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BOLGE_ID, 'url' => ['view', 'id' => $model->BOLGE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cografi Bolge Bilgileri</h3>
				</div>
				<div class="bolge-update">
					<div class="box-body">
						<?= $this->render('_form', ['model' => $model,]) ?>
                        <p class="help-block">Tamamlamak icin guncelleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

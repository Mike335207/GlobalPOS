<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esnaf */

$this->title = 'Esnaf Bilgileri Guncelle: ' . $model->AD;
$this->params['breadcrumbs'][] = ['label' => 'Esnafs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'VERGI_NO' => $model->VERGI_NO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Esnaf Bilgileri</h3>
				</div>
                <div class="esnaf-update">
                	<div class="box-body">
						<?= $this->render('_form', ['model' => $model,]) ?>
                       	<p class="help-block">Tamamlamak icin guncelleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

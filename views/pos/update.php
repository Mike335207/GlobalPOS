<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pos */

$this->title = 'Pos Cihazi Bilgilerini Guncelle: ' . $model->POS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Pos Cihazi Bilgileri</h3>
				</div>
<div class="pos-update">
<div class="box-body">
    <?= $this->render('_form', ['model' => $model,]) ?>
<p class="help-block">Tamamlamak icin guncelleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>


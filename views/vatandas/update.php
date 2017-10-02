<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vatandas */

$this->title = 'Vatandas Bilgilerini Guncelle: ' . $model->AD;
$this->params['breadcrumbs'][] = ['label' => 'Vatandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AD, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Guncelle';
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Vatandas Bilgileri</h3>
				</div>
				<div class="vatandas-update">
 					<div class="box-body">
                        <?= $this->render('_form', ['model' => $model,]) ?>
                        <p class="help-block">Tamamlamak icin guncelleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

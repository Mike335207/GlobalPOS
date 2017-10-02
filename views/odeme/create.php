<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Odeme */

$this->title = 'Yeni Yükleme/Ödeme Ekleme';
$this->params['breadcrumbs'][] = ['label' => 'Odemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Kart Bilgileri</h3>
				</div>
				<div class="kart-create">
					<div class="box-body">
						<?= $this->render('_form', ['model' => $model,]) ?>
                        <p class="help-block">Yükleme işlemini tamamlamak icin yükleye basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

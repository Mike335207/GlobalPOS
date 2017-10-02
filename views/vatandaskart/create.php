<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vatandaskart */

$this->title = 'Vatandaş Ekle';
$this->params['breadcrumbs'][] = ['label' => 'Kartlar', 'url' => ['index']];
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
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
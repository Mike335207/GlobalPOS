<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kart */

$this->title = 'Yeni Kart Tanimlama';
$this->params['breadcrumbs'][] = ['label' => 'Karts', 'url' => ['index']];
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
                        <p class="help-block">Tamamlamak icin kaydete basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

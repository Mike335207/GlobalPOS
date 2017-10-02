<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sektor */

$this->title = 'Yeni Sektör Tanımlama';
$this->params['breadcrumbs'][] = ['label' => 'Sektörler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Sektör Bilgileri</h3>
				</div>
				<div class="pos-create">
                    <div class="box-body">
                        <?= $this->render('_form', ['model' => $model,]) ?>
                      	<p class="help-block">Tamamlamak icin kaydete basiniz</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
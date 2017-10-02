<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bolge */

\Yii::$app->language = 'tr-TR';

$this->title = 'Yeni Bölge Tanımlama';
$this->params['breadcrumbs'][] = ['label' => 'Bolgeler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Coğrafi Bölge Bilgileri</h3>
				</div>
                <div class="bolge-create">
                <div class="box-body">
   					<?= $this->render('_form', ['model' => $model,]) ?>
                  	<p class="help-block">Tamamlamak için kaydete basınız</p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
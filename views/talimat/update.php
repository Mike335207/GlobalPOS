<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Talimat */

$this->title = 'Yükleme Talimatı Güncelleme: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Talimats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="talimat-update">

    <?= $this->render('_form', [
        'model' => $model,
		'dataProviderOdeme' => $dataProviderOdeme,
    ]) ?>

</div>

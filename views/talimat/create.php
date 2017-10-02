<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Talimat */

$this->title = 'Yükleme Talimat Tanımlama';
$this->params['breadcrumbs'][] = ['label' => 'Yükleme Talimatları', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talimat-create">


    <?= $this->render('_form', [
        'model' => $model, 
		'dataProviderOdeme' => $dataProviderOdeme,
    ]) ?>

</div>

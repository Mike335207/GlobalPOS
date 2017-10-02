<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Esnafpos */

$this->title = 'Create Esnafpos';
$this->params['breadcrumbs'][] = ['label' => 'Esnafpos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esnafpos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

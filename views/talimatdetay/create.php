<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Talimatdetay */

$this->title = 'Create Talimatdetay';
$this->params['breadcrumbs'][] = ['label' => 'Talimatdetays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talimatdetay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VatandaskartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vatandaskarts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vatandaskart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vatandaskart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KART_ID',
            'VATANDAS_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

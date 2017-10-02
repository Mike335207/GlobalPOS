<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TalimatderaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Talimatdetays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talimatdetay-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Talimatdetay', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'TALIMAT_ID',
            'KART_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

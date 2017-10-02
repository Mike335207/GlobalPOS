<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Kullanıcı Tanımlama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

	<section class="content">
		<div class="row">
		<!-- SOL SÜTUN -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kullanıcı Bilgileri</h3>
            </div>
            <div class="box-body">
				<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
						
						<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
						
						<?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
						
						<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
						
						<?= $form->field($model, 'email') ?>
						
						<?= $form->field($model, 'password')->passwordInput() ?>
						
						<?php $authItems = ArrayHelper::map($authItems, 'name', 'description'); ?>

						<div class="form-group">
							<?= Html::submitButton('Kaydet', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
						</div>

						<?php ActiveForm::end(); ?>
            </div>
          </div>  
        </div>
        
        <!-- SAG SÜTUN -->
        <div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Kullanıcı Yetkilendime</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?= $form->field($model, 'permissions')->checkboxList($authItems) ?>
				</div>
			</div>
        </div>
		</div>
	</section>
</div>
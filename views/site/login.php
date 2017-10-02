<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="site-login">
	<div class="login-logo"><b>Global</b>POS</div>
	<p class="text-muted text-center">
		Kurumsal çözüm ortağınız!
	</p>
</div>

<div class="box box-primary">
	<div class="box-body box-profile">
		<h3 class="profile-username text-left">
			Giriş Yapınız
		</h3>
		<p class="text-muted text-left">
			Lütfen, giriş yapmak için aşağıdaki alanları doldurunuz:
		</p>
		<?php $form = ActiveForm::begin([
						'id' => 'login-form',
						'layout' => 'horizontal',
						'fieldConfig' => [
							'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
							'labelOptions' => ['class' => 'col-lg-1 control-label'],
						],
					]); 
		?>
		<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
		<?= $form->field($model, 'password')->passwordInput() ?>
		<?= $form->field($model, 'rememberMe')->checkbox([
							'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
						]) 
		?>

		<div class="form-group">
			<div class="col-lg-offset-1 col-lg-11">
				<?= Html::submitButton('Giriş', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
			</div>
		</div>

		<?php ActiveForm::end(); ?>
		<div class="col-lg-offset-1" style="color:#999;">
			You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
			To modify the username/password, please check out the code <code>app\models\User::$users</code>.
		</div>
	</div>
</div>



		  
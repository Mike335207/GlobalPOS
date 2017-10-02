<?php

/**
 * @var $content string
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

yiister\adminlte\assets\Asset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/web/index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>G</b>Pos</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Global</b>POS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
					
										<?php
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'items' => [
							['label' => 'SignUp', 'url' => ['/site/signup']],
							
							Yii::$app->user->isGuest ? (
								['label' => 'Login', 'url' => ['/site/login']]
							) : (
								'<li>'
								. Html::beginForm(['/site/logout'], 'post')
								. Html::submitButton(
									'Logout (' . Yii::$app->user->identity->username . ')',
									['class' => 'btn btn-link logout']
								)
								. Html::endForm()
								. '</li>'
							)
						],
					]);
					?>
                    <!--
					<?php
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'items' => [
							['label' => 'SignUp', 'url' => ['/site/signup']],
							
							Yii::$app->user->isGuest ? (
								['label' => 'Login', 'url' => ['/site/login']]
							) : (
								'<li>'
								. Html::beginForm(['/site/logout'], 'post')
								. Html::submitButton(
									'Logout (' . Yii::$app->user->identity->username . ')',
									['class' => 'btn btn-link logout']
								)
								. Html::endForm()
								. '</li>'
							)
						],
					]);
					?>
					-->
                    <!-- Control Sidebar Toggle Button -->
					
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://placehold.it/45x45" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php if ((Yii::$app->user->isGuest)) {echo 'Guest';} else {echo Yii::$app->user->identity->username ;}?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Cevrimici</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Menu Arama...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <?=
            \yiister\adminlte\widgets\Menu::widget(
                [
                    "items" => [
                        ["label" => "AnaSayfa", "url" => "/web/index.php", "icon" => "home"],
                       // ["label" => "Layout", "url" => ["site/layout"], "icon" => "files-o"],
                       // ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
						[
						
                            "label" => "Kart Islemleri",
                            "icon" => "fa fa-reorder",
                            "url" => "#",
                            "items" => [
							    ["label" => "Kart Bilgileri / Kart Ekleme", "url" => ["kart/index"]],
								["label" => "Kart Hareketleri Goruntuleme", "url" => ["odeme/index"]],
								["label" => "Yükleme Talimatları", "url" => ["talimat/index"]],
                            ],
                        ],
						
						[
						
                            "label" => "Pos Cihazi Islemleri",
                            "icon" => "fa fa-reorder",
                            "url" => "#",
                            "items" => [
							    ["label" => "POS Cihazi Bilgileri", "url" => ["pos/index"]],
								["label" => "POS Hareketleri Goruntuleme", "url" => ["home"]],
                            ],
                        ],
						[
						
                            "label" => "Fatura Islemleri",
                            "icon" => "fa fa-sticky-note-o",
                            "url" => "#",
                            "items" => [
							    ["label" => "Fatura Hesaplama", "url" => ["home"]],
                            ],
                        ],
						[
						
                            "label" => "Tanimlamalar",
                            "icon" => "fa fa-database",
                            "url" => "#",
                            "items" => [
								["label" => "Vatandas Bilgileri", "url" => ["vatandas/index"]],
								["label" => "Esnaf Bilgileri", "url" => ["esnaf/index"]],
                                ["label" => "Bolgeler Bilgileri", "url" => ["bolge/index"]],
                                ["label" => "Sektör Bilgileri", "url" => ["sektor/index"]],
								["label" => "Oran-Periyod Bilgileri", "url" => ["home"]],
                                
                            ],
                        ],
                      	[
						
                            "label" => "Sistem Yönetimi",
                            "icon" => "fa fa-cogs",
                            "url" => "#",
                            "items" => [
								["label" => "Kullanıcı Bilgileri", "url" => ["user/index"]],
								["label" => "Yeni Kullanıcı Tanımlama", "url" => ["/site/signup"]],
                                
                            ],
                        ],
						[
						
                            "label" => "Raporlar",
                            "icon" => "fa fa-line-chart",
                            "url" => ["/site/reports"],
                            /*"items" => [
								["label" => "Coğrafi Bölge Bazında Raporlama", "url" => ["home"]],
								["label" => "Sektörel Bazda Raporlama", "url" => ["/site/signup"]],
								["label" => "Esnaf Raporu", "url" => ["/site/signup"]], 
                                
                            ],*/
                        ],
						["label" => "Güvenli Çıkış", "icon" => "fa fa-close", "url" => ["/site/logout"]],
			
                        [
                            "label" => "TEST",
                            "url" => "#",
                            "icon" => "table",
                            "items" => [
                                [
                                    "label" => "Second level",
                                    "url" => "#",
                                ],
                                [
                                    "label" => "Second level",
                                    "url" => "#",
                                    "icon" => "table",
                                    "items" => [
                                        [
                                            "label" => "Default",
                                            "url" => "#",
                                        ],
                                        [
                                            "label" => "Red",
                                            "url" => "#",
                                            "icon" => "table",
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            )
            ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= Html::encode(isset($this->params['h1']) ? $this->params['h1'] : $this->title) ?>
            </h1>
            <?php if (isset($this->params['breadcrumbs'])): ?>
                <?=
                \yii\widgets\Breadcrumbs::widget(
                    [
                        'encodeLabels' => false,
                        'homeLink' => [
                            'label' => new \rmrevin\yii\fontawesome\component\Icon('home') . ' Home',
                            'url' => '/',
                        ],
                        'links' => $this->params['breadcrumbs'],
                    ]
                )
                ?>
            <?php endif; ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= $content ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Telif Hakki &copy; <a href="http://globalsistem.com.tr">Global Sistem</a> <?= date("Y") ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
			<!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

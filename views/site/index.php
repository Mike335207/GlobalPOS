<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Odeme;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\data\SqlDataProvider;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GlobalPOS | Kontrol Paneli</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php

/* @var $this yii\web\View */

$this->title = 'Kontrol Paneli';
?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>Yeni</br>Basvurular</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Devami <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
			  <?php
				$fraction =  Yii::$app->db->createCommand('
				SELECT ROUND((SELECT SUM(TUTAR) FROM odeme WHERE TUTAR < 0)  / (SELECT SUM(TUTAR) FROM odeme WHERE TUTAR > 0) * (-100), 0) AS FRACTION')->queryScalar();
				
				$income =  Yii::$app->db->createCommand('
				SELECT ROUND((SELECT SUM(TUTAR) FROM odeme WHERE TUTAR > 0), 0)')->queryScalar();
				
				$outcome =  Yii::$app->db->createCommand('
				SELECT ROUND((SELECT SUM(TUTAR) FROM odeme WHERE TUTAR < 0), 0)*-1')->queryScalar();
			  ?>
			  <?php
				echo $fraction
			  ?>
			    
			  <sup style="font-size: 20px">%</sup></h3>

              <p>Anlik</br>Harcama Orani</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Devami <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			  <?php
				echo Yii::$app->db->createCommand('
				SELECT COUNT(*) FROM vatandaskart')->queryScalar();
			  ?>
			  
			  </h3>

              <p>Aktif</br>Vatandas Kullanimi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Devami <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65<sup style="font-size: 20px">%</sup></h3>
              <p>Basvuru</br>Karsilama Orani</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Devami <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bölgelere Göre Harcama Dağılımı</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div> <!-- /box-tools pull-right -->
            </div> <!-- /box-header with-border -->
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center"><strong>1 Ocak 2017 - 24 Şubat 2017 arası</strong></p>
                  <p class="text-center">Buraya Grafik Gelecek</p>
                </div>

                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Anlık Detaylar</strong>
                  </p>
                  
				  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Yatırım/Harcama Oranı</span>
                    <span class="progress-number"><b>
					<?php
						echo $fraction
					?> %
					
					</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width:

					<?php
						echo $fraction
					?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Toplam Kartlardaki Bedel</span>
                    <span class="progress-number"><b>
					<?php
						echo ($income - $outcome);
					?>

					TL</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Toplam Harcama Bedeli</span>
                    <span class="progress-number"><b>
					<?php
						echo $outcome
					?> TL</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div> <!-- /.progress-group -->
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Yatırım/Harcama Oranı(TL)</span>
                    <span class="progress-number"><b>400.000 TL/500.000 TL</b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div> <!-- /.progress-group -->
                </div> <!-- /.col-md-4 -->
              </div> <!-- /box-body -->
            </div> <!-- /box -->
           </div> <!-- /col-md-12 -->
         </div> <!-- /row --> 
            
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Son Satışlar</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
        	<?php
			//$query = (new Query())->select('odeme.POS_ID, odeme.KART_ID, kart.ID, kart.KART_NO, odeme.TARIH, odeme.TUTAR')->from('odeme, pos, kart')->leftjoin( 'kart', ['odeme.KART_ID'=>'kart.ID'])->where('TUTAR < 0')->limit(5); 
			//$query = (new Query())->select( 'odeme.ID, odeme.KART_ID, kart.KART_NO, pos.POS_ID, odeme.TARIH, odeme.TUTAR')->from('odeme')->where('odeme.TUTAR<0')->leftjoin('kart', 'odeme.KART_ID = kart.ID')->leftjoin('pos', 'odeme.POS_ID = pos.ID')
			//	->orderBy(['odeme.ID'=>'SORT_DESC']);
			//$dataprovider = new ActiveDataProvider([
			 //   'query' => $query,
			//]);
				$count = Yii::$app->db->createCommand('
				SELECT COUNT(*) FROM odeme WHERE TUTAR<0')->queryScalar();

			$dataprovider = new SqlDataProvider([
				'sql' => 'SELECT odeme.ID, odeme.TUTAR*-1 AS TUTAR, kart.KART_NO, pos.POS_ID AS Pos, odeme.TARIH, vatandas.AD AS AD, vatandas.SOYAD AS SOYAD, esnaf.AD AS Açıklama
						FROM odeme
						LEFT JOIN pos ON odeme.POS_ID = pos.ID
						LEFT JOIN kart ON odeme.KART_ID = kart.ID
						LEFT JOIN vatandaskart ON vatandaskart.KART_ID=odeme.KART_ID
						LEFT JOIN vatandas ON vatandas.ID=vatandaskart.VATANDAS_ID
						LEFT JOIN esnafpos ON esnafpos.POS_ID=pos.ID
						LEFT JOIN esnaf ON esnaf.ID=esnafpos.ESNAF_ID
						WHERE odeme.TUTAR < 0
						ORDER BY odeme.ID DESC
						limit 10;',
				'totalCount' =>10,
				'pagination' => [
					'pageSize' => 10,
				],
				'sort' => [
					'attributes' => [
						'TARIH'
					],
				],
			]);
				
				
			echo GridView::widget
					([
                        'dataProvider' => $dataprovider,
                        'columns' => 
						[
                            ['class' => 'yii\grid\SerialColumn'],
							'TARIH',
							'Açıklama',
							'AD',
							'SOYAD',
							'KART_NO',
							'TUTAR',
                       	],
                    ]); 
					?> 
            </div>
          </div>
        </div>
      </div>
  
</section>
</body>
</html>

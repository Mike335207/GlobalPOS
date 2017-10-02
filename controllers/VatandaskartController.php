<?php

namespace app\controllers;

use Yii;
use app\models\Vatandaskart;
use app\models\VatandaskartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Odeme;

/**
 * VatandaskartController implements the CRUD actions for Vatandaskart model.
 */
class VatandaskartController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vatandaskart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VatandaskartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionBulk()
    {
        $searchModel = new VatandaskartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	
	$count = Yii::$app->db->createCommand('
		SELECT COUNT(*) FROM kart
			INNER JOIN vatandaskart ON kart.ID = vatandaskart.KART_ID')->queryScalar();

	/*$dataProvider = new SqlDataProvider([
		'sql' => 'SELECT kart.ID AS ID, kart.KART_NO, CONCAT(vatandas.AD, " ", vatandas.SOYAD) AS VatandasName
			FROM kart
			INNER JOIN vatandaskart ON kart.ID = vatandaskart.KART_ID
			LEFT JOIN vatandas ON vatandaskart.VATANDAS_ID = vatandas.ID',
			'totalCount' =>$count,
			'pagination' => [
			'pageSize' => 10,
			],
			'sort' => [
				'attributes' => [
					'ID'
					],
				],
			]);
	*/
	//$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('bulk', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGroupaccrual()
    {
	$amount=(string)Yii::$app->request->post('amount');	
	$selection=(array)Yii::$app->request->post('selection');//typecasting
    	foreach($selection as $id){
		$modelOdeme = new Odeme();
		$modelOdeme->KART_ID = $id;
		$modelOdeme->POS_ID = '0';	//default POS
		$modelOdeme->TARIH = date('Y-m-d');
		$modelOdeme->TUTAR = $amount;
        	$modelOdeme->save();
		//echo $id;
    	}	
	return $this->redirect(['index']);
    }

    /**
     * Displays a single Vatandaskart model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vatandaskart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($kart, $vatandas)
    {
        $model = new Vatandaskart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
			$model->KART_ID = $kart;
			$model->VATANDAS_ID = $vatandas;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vatandaskart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Vatandaskart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vatandaskart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vatandaskart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vatandaskart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

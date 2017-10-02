<?php

namespace app\controllers;

use Yii;
use app\models\Talimat;
use app\models\TalimatSearch;
use app\models\Vatandaskart;
use app\models\VatandaskartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Odeme;
use yii\data\ActiveDataProvider;

/**
 * TalimatController implements the CRUD actions for Talimat model.
 */
class TalimatController extends Controller
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
     * Lists all Talimat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TalimatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Talimat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new VatandaskartSearch();
        $dataProviderOdeme = $searchModel->search(Yii::$app->request->queryParams);
		
		$query = Odeme::find()->where(['TALIMAT_ID' => $id]);
		$provider = new ActiveDataProvider([
				'query' => $query,]);
		
		// 7.Burası Eklenecek
		if (Yii::$app->request->isAjax)
		{
			return $this->renderAjax('view', [
				'model' => $this->findModel($id),
				'dataProviderOdeme' => $provider,
			]); 
		} else 
		{
			return $this->render('view', [
				'model' => $this->findModel($id),
				'dataProviderOdeme' => $provider,
			]); 
		}
    }

    /**
     * Creates a new Talimat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Talimat();
		
		$searchModel = new VatandaskartSearch();
        $dataProviderOdeme = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
			$selection=(array)Yii::$app->request->post('selection');//typecasting
				foreach($selection as $id){
				$modelOdeme = new Odeme();
				$modelOdeme->KART_ID = $id;
				$modelOdeme->POS_ID = '0';	//default POS
				$modelOdeme->TARIH = $model->TALIMAT_TARIH;
				$modelOdeme->TUTAR = $model->TUTAR;
				$modelOdeme->TALIMAT_ID = $model->ID;
				$modelOdeme->save();
			}	
			
			//return $this->redirect(['view', 'id' => $model->ID]);
			// 8. Burası Eklenecek
			return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
				'dataProviderOdeme' => $dataProviderOdeme,
            ]);
        }
    }

    /**
     * Updates an existing Talimat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$query = Odeme::find()->where(['TALIMAT_ID' => $id]);
		$provider = new ActiveDataProvider([
				'query' => $query,]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			$query = Odeme::find()->where(['TALIMAT_ID' => $id]);
			$provider = new ActiveDataProvider([
					'query' => $query,]);
			$models = $provider->getModels();
			
			foreach($models as $modelOdeme){
				$modelOdeme->TARIH = $model->TALIMAT_TARIH;
				$modelOdeme->TUTAR = $model->TUTAR;
				$modelOdeme->save();
			}
			
            //return $this->redirect(['view', 'id' => $model->ID]);
			// 9. Burası Eklenecek
			return $this->redirect(['index']);
        } else {
			if (Yii::$app->request->isAjax)
			{
				return $this->renderAjax('update', [
					'model' => $model,
					'dataProviderOdeme' => $provider
				]);
			} else 
			{
				return $this->render('update', [
					'model' => $model,
					'dataProviderOdeme' => $provider
				]);
			}
        }
    }

    /**
     * Deletes an existing Talimat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$query = Odeme::find()->where(['TALIMAT_ID' => $id]);
		$provider = new ActiveDataProvider([
				'query' => $query,]);
		$models = $provider->getModels();
		
		foreach($models as $modelOdeme){
			$modelOdeme->delete();
		}
		
		$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Talimat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Talimat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Talimat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

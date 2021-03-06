<?php

namespace app\controllers;

use Yii;
use app\models\Kart;
use app\models\KartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;

/**
 * KartController implements the CRUD actions for Kart model.
 */
class KartController extends Controller
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
     * Lists all Kart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kart model.
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
     * Creates a new Kart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if(Yii::$app->user->can('create-card'))
	{       
		$model = new Kart();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
		    return $this->redirect(['view', 'id' => $model->ID]);
		} else {
		    return $this->render('create', [
		        'model' => $model,
		    ]);
		}
	} else throw new ForbiddenHttpException;
    }

    /**
     * Updates an existing Kart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	if(Yii::$app->user->can('update-card'))
	{         
		$model = $this->findModel($id);
	       /* return $this->redirect(Url::toRoute(['reportico/mode/execute',
							    'project' => 'GlobalPOS', 
							    'new_reportico_window' => 1,
							    'report' => 'KartHareketleri',
											'target_format'=>'HTML',
											'MANUAL_KartNo'=>$id,
											'MANUAL_DateRange_FROMDATE'=>$model->reportStartDate,
											'MANUAL_DateRange_TODATE'=>$repFinDate]));

	
		*/
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
		    return $this->redirect(['view', 'id' => $model->ID]);
		} else {
		    return $this->render('update', [
		        'model' => $model,
		    ]);
		}
	} else throw new ForbiddenHttpException;
    }

    /**
     * Deletes an existing Kart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if(Yii::$app->user->can('delete-card'))
	{           
		$model = $this->findModel($id);
			if ($model->isUsed() == 0)
				$this->findModel($id)->delete();
			else Yii::$app->session->setFlash('error', "İşlem yapılan kartı silemezsiniz. (Kart hareketleri bulunmaktadır.)");

		return $this->redirect(['index']);
	} else throw new ForbiddenHttpException;
    }

    /**
     * Finds the Kart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

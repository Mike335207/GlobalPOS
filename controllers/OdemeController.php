<?php

namespace app\controllers;

use Yii;
use app\models\Odeme;
use app\models\OdemeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * OdemeController implements the CRUD actions for Odeme model.
 */
class OdemeController extends Controller
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
     * Lists all Odeme models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OdemeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Odeme model.
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
     * Creates a new Odeme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if (false)
	{       
		$model = new Odeme();

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
     * Updates an existing Odeme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	if(Yii::$app->user->can('update-odeme'))
	{               
		$model = $this->findModel($id);

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
     * Deletes an existing Odeme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if(Yii::$app->user->can('delete-odeme'))
	{            
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	} else throw new ForbiddenHttpException;
    }

    /**
     * Finds the Odeme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Odeme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Odeme::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

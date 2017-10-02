<?php

namespace app\controllers;

use Yii;
use app\models\Esnaf;
use app\models\EsnafSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EsnafController implements the CRUD actions for Esnaf model.
 */
class EsnafController extends Controller
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
     * Lists all Esnaf models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EsnafSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Esnaf model.
     * @param integer $ID
     * @param string $VERGI_NO
     * @return mixed
     */
    public function actionView($ID, $VERGI_NO)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $VERGI_NO),
        ]);
    }

    /**
     * Creates a new Esnaf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Esnaf();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'VERGI_NO' => $model->VERGI_NO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Esnaf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param string $VERGI_NO
     * @return mixed
     */
    public function actionUpdate($ID, $VERGI_NO)
    {
        $model = $this->findModel($ID, $VERGI_NO);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'VERGI_NO' => $model->VERGI_NO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Esnaf model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param string $VERGI_NO
     * @return mixed
     */
    public function actionDelete($ID, $VERGI_NO)
    {
        $this->findModel($ID, $VERGI_NO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Esnaf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param string $VERGI_NO
     * @return Esnaf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $VERGI_NO)
    {
        if (($model = Esnaf::findOne(['ID' => $ID, 'VERGI_NO' => $VERGI_NO])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

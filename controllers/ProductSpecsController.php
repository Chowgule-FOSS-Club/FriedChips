<?php

namespace app\controllers;

use Yii;
use app\models\ProductSpecs;
use app\models\ProductSpecsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * ProductSpecsController implements the CRUD actions for ProductSpecs model.
 */
class ProductSpecsController extends Controller
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
     * Lists all ProductSpecs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSpecsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductSpecs model.
     * @param integer $sid
     * @param integer $pid
     * @return mixed
     */
    public function actionView($sid, $pid)
    {
        return $this->render('view', [
            'model' => $this->findModel($sid, $pid),
        ]);
    }

    /**
     * Creates a new ProductSpecs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductSpecs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sid' => $model->sid, 'pid' => $model->pid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductSpecs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $sid
     * @param integer $pid
     * @return mixed
     */
    public function actionUpdate($sid, $pid)
    {
        $model = $this->findModel($sid, $pid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sid' => $model->sid, 'pid' => $model->pid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductSpecs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $sid
     * @param integer $pid
     * @return mixed
     */
    public function actionDelete($sid, $pid)
    {
        $this->findModel($sid, $pid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductSpecs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $sid
     * @param integer $pid
     * @return ProductSpecs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sid, $pid)
    {
        if (($model = ProductSpecs::findOne(['sid' => $sid, 'pid' => $pid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

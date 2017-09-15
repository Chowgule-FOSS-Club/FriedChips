<?php

namespace app\controllers;

use Yii;
use app\models\ProductCategory;
use app\models\ProductCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm; 
use yii\helpers\Url;

/**
 * ProductCategoryController implements the CRUD actions for ProductCategory model.
 */
class ProductCategoryController extends Controller
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
     * Lists all ProductCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductCategory model.
     * @param integer $pid
     * @param integer $cid
     * @return mixed
     */
    public function actionView($pid, $cid)
    {
        return $this->render('view', [
            'model' => $this->findModel($pid, $cid),
        ]);
    }

    /**
     * Creates a new ProductCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategory();       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {       
            return $this->redirect(['view', 'pid' => $model->pid, 'cid' => $model->cid]);                  
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $pid
     * @param integer $cid
     * @return mixed
     */
    public function actionUpdate($pid, $cid)
    {
        $model = $this->findModel($pid, $cid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pid' => $model->pid, 'cid' => $model->cid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $pid
     * @param integer $cid
     * @return mixed
     */
    public function actionDelete($pid, $cid)
    {
        $this->findModel($pid, $cid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $pid
     * @param integer $cid
     * @return ProductCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pid, $cid)
    {
        if (($model = ProductCategory::findOne(['pid' => $pid, 'cid' => $cid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

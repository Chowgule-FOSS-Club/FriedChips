<?php

namespace app\controllers;

use Yii;
use app\models\ProductQuestion;
use app\models\ProductQuestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductQuestionController implements the CRUD actions for ProductQuestion model.
 */
class ProductQuestionController extends Controller
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
     * Lists all ProductQuestion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductQuestion model.
     * @param integer $pid
     * @param integer $qid
     * @return mixed
     */
    public function actionView($pid, $qid)
    {
        return $this->render('view', [
            'model' => $this->findModel($pid, $qid),
        ]);
    }

    /**
     * Creates a new ProductQuestion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductQuestion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pid' => $model->pid, 'qid' => $model->qid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductQuestion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $pid
     * @param integer $qid
     * @return mixed
     */
    public function actionUpdate($pid, $qid)
    {
        $model = $this->findModel($pid, $qid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pid' => $model->pid, 'qid' => $model->qid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing ProductQuestion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $pid
     * @param integer $qid
     * @return mixed
     */
    public function actionDelete($pid, $qid)
    {
        $this->findModel($pid, $qid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductQuestion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $pid
     * @param integer $qid
     * @return ProductQuestion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pid, $qid)
    {
        if (($model = ProductQuestion::findOne(['pid' => $pid, 'qid' => $qid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\UserAnsQuestions;
use app\models\UserAnsQuestionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAnsQuestionsController implements the CRUD actions for UserAnsQuestions model.
 */
class UserAnsQuestionsController extends Controller
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
     * Lists all UserAnsQuestions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAnsQuestionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
  
    /**
     * Finds the UserAnsQuestions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $userid
     * @param integer $qid
     * @param integer $pid
     * @return UserAnsQuestions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userid, $qid, $pid)
    {
        if (($model = UserAnsQuestions::findOne(['userid' => $userid, 'qid' => $qid, 'pid' => $pid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

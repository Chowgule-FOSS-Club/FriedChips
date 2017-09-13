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
     * Displays a single UserAnsQuestions model.
     * @param string $created_time
     * @param integer $pid
     * @param integer $qid
     * @param integer $uid
     * @return mixed
     */
    public function actionView($created_time, $pid, $qid, $uid)
    {
        return $this->render('view', [
            'model' => $this->findModel($created_time, $pid, $qid, $uid),
        ]);
    }

   
    

    /**
     * Finds the UserAnsQuestions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $created_time
     * @param integer $pid
     * @param integer $qid
     * @param integer $uid
     * @return UserAnsQuestions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($created_time, $pid, $qid, $uid)
    {
        if (($model = UserAnsQuestions::findOne(['created_time' => $created_time, 'pid' => $pid, 'qid' => $qid, 'uid' => $uid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

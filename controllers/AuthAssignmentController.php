<?php

namespace app\controllers;

use Yii;
use app\models\roles\AuthAssignment;
use app\models\AuthAssignmentSearchModel;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('RBAC')){
            $searchModel = new AuthAssignmentSearchModel();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {
        if(Yii::$app->user->can('RBAC')){
            return $this->render('view', [
                'model' => $this->findModel($item_name, $user_id),
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('RBAC')){
            $model = new AuthAssignment();
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($model->load(Yii::$app->request->post())) {
                $authManager = Yii::$app->authManager;
                $authManager->assign($authManager->getRole($model->item_name), $model->user_id);
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionDelete($item_name, $user_id)
    {
        if(Yii::$app->user->can('RBAC')){
            $this->findModel($item_name, $user_id)->delete();
            return $this->redirect(['index']);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

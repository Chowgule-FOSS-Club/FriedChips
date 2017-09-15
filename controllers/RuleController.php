<?php

namespace app\controllers;

use Yii;
use app\models\roles\AuthRule;
use app\models\RuleSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuleController implements the CRUD actions for AuthRule model.
 */
class RuleController extends Controller
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
     * Lists all AuthRule models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('RBAC')){
            $searchModel = new RuleSearchModel();
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
     * Displays a single AuthRule model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('RBAC')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Creates a new AuthRule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('RBAC')){
            $model = new AuthRule();
            if ($model->load(Yii::$app->request->post())) {
                $authManager = Yii::$app->authManager;
                try{
                    $authManager->add(new $model->name);
                }catch(yii\db\IntegrityException $e){
                    return $this->render('create', ['flag' => 0, 'model' => $model]);
                }
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

 

    /**
     * Deletes an existing AuthRule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            $authManager->remove($authManager->getRule($id));
            return $this->redirect(['index']);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Finds the AuthRule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthRule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthRule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

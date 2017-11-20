<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use app\models\roles\AuthItem;
use app\models\roles\AuthItemChild;
use app\models\Permissions;
use app\models\AuthSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;

/**
 * AuthController implements the CRUD actions for AuthItem model.
 */
class AuthController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            $permissions = $authManager->getPermissions();
            $model = new ArrayDataProvider([
                'allModels' => $permissions,
            ]);
            return $this->render(
                'index',
                ['dataProvider' => $model]
            );
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }

    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            return $this->render('view', [
                'model' => $authManager->getPermission($id),
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('RBAC')){
            $model = new AuthItem();
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($model->load(Yii::$app->request->post())) {
                $authManager = Yii::$app->authManager;
                $newPermission = $authManager->createPermission($model->name);
                $newPermission->description = $model->description;
                $authManager->add($newPermission);
                return $this->redirect(['view', 'id' => $model->name]);
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
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $model = AuthItem::findOne($id);
            $model->temp_name = $model->name;
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            
            if ($model->load(Yii::$app->request->post())) {
                $authManager = Yii::$app->authManager;
                $permission = $authManager->getPermission($model->temp_name);
                $permission->name = $model->name;
                $permission->description = $model->description;
                $authManager->update($model->temp_name, $permission);
                return $this->redirect(['view', 'id' => $model->name]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            $authManager->remove($authManager->getPermission($id));
            return $this->redirect(['index']);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

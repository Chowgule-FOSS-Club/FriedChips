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
        $searchModel = new AuthSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $authManager = Yii::$app->authManager;
        $model = $this->findModel($id);
        $model->my_id = $model->name;
        $model->permissions = $authManager->getPermissionsByRole($id);
        $model->scenario = "create-role";
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if($model->load(Yii::$app->request->post())){
            $authManager = Yii::$app->authManager;
            $authManager->remove($authManager->getRole($model->my_id));
            $newRole = $authManager->createRole($model->name);
            $authManager->add($newRole);
            foreach($model->permissions as $permission){
                $fetchedPermission = $authManager->getPermission($permission);
                $authManager->addChild($newRole, $fetchedPermission);
            }
        }else{
            return $this->render(
                'update-role',
                [
                    'model' => $model,
                ]
            );
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreateRole(){
        
        $authManager = Yii::$app->authManager;
        
        $model = new AuthItem();
        // $this->layout = "product";
        $model->scenario = "create-role";
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if($model->load(Yii::$app->request->post())){
            $authManager = Yii::$app->authManager;
            $newRole = $authManager->createRole($model->name);
            $authManager->add($newRole);
            foreach($model->permissions as $permission){
                $fetchedPermission = $authManager->getPermission($permission);
                if($fetchedPermission == null){
                    $fetchedRole = $authManager->getRole($permission);
                    $authManager->addChild($newRole, $fetchedRole);
                }else{
                    $authManager->addChild($newRole, $fetchedPermission);
                }
            }
            
        }else{
            return $this->render(
                'create-role',
                [
                    'model' => $model,
                ]
            );
        }
    }

    public function actionUpdateRole($id){
        
    }

    public function actionViewRoles(){
        $authManager = Yii::$app->authManager;
        $roles = $authManager->getRoles();
        $provider = new ArrayDataProvider([
                'allModels' => $roles,
            ]);
        return $this->render(
            'view-roles',
            ['model' => $provider]
        );
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

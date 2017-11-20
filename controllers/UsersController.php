<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\ImageUpload;
use app\models\Users;
use app\controllers\UsersSearchController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Imagine\Image\Box;
use yii\imagine\Image;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('view-all-users') || Yii::$app->user->can('users') ){
            $searchModel = new UsersSearchController();
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
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can("view-user-details",['users' => $model]) || Yii::$app->user->can('users')){
            return $this->render('view', [
                'model' => $model,
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can("create-user") || Yii::$app->user->can('users')){
            $model = new Users();
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
    
            if ($model->load(Yii::$app->request->post())) {
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if(empty($model->imageFile)){
                    $model->image = 'uploads/default.png';
                }else{
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    $model->imageFile->saveAs('uploads/'. $model->imageFile->baseName.'.'.$model->imageFile->extension);
                    $model->image = 'uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
                }
                
                if ($model->save()) {
                    if(!empty($model->imageFile)){
                        Image::frame('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension)
                        ->thumbnail(new box(400, 400))
                        ->save('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension, ['quality' => 50]);
                    }
                    return $this->redirect(['view', 'id' => $model->userid]);
                } else {
                    echo "error while saving..";
                }
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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can("update-user-details", ['users' => $model]) || Yii::$app->user->can('users') ){
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->userid]);
                } else {
                    return $this->render('create', [
                    'model' => $model,
                    ]);
                }
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
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can('delete-user' , ['user' => $model]) || Yii::$app->user->can('users') ){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }
    

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangePassword($id)
    {   
        $model = $this->findModel($id);
        if(Yii::$app->user->can('update-password' , ['user' => $model]) || Yii::$app->user->can('users') ){
            
            $model->scenario = 'update-password';
            if ($model->load(Yii::$app->request->post())) {
                if($model->password_repeat === $model->password){
                    $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                    $model->password_repeat = $model->password;
                }
                if ($model->save()) {
                    return $this->redirect(['users/view', 'id' => $model->userid]);
                }
            }
            
            $model->password = "";
            $model->password_repeat = "";
            $model->old_password = "";

            return $this->render(
                'update_password', [
                    'model' => $model,
                ]
            );
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionUpdateDp($id){
        $model = $this->findModel($id);
        if(Yii::$app->user->can('update-dp' , ['user' => $model]) || Yii::$app->user->can('users') ){
            $model->scenario = 'update-dp';
            if ($model->load(Yii::$app->request->post())) {
                $model->imageFile = UploadedFile::getInstance($model,'imageFile');
                $model->imageFile->saveAs('uploads/'. $model->imageFile->baseName.'.'.$model->imageFile->extension);
                $model->image = 'uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
                if ($model->save()) {
                    Image::frame('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension)
                    ->thumbnail(new box(400, 400))
                    ->save('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension, ['quality' => 50]);
                    return $this->redirect(['view', 'id' => $model->userid]);
                }
            }
            return $this->render(
                'update_dp', [
                    'model' => $model,
                ]
            );
        }else{
            //Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }
    /*

    public function actionAssign(){
        $authManager = Yii::$app->authManager;
        $authManager->assign();
    }

    public function actionRule(){
        $authManager = Yii::$app->authManager;

        // add the rule
        $rule = new \app\models\rules\DisplayLoggedUser;
        $authManager->add($rule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $authManager->createPermission('check-details');
        $updateOwnPost->description = 'check only his details';
        $updateOwnPost->ruleName = $rule->name;
        $authManager->add($updateOwnPost);

        // "updateOwnPost" will be used from "updatePost"
        $authManager->addChild($updateOwnPost, $authManager->getPermission('update-user-details'));
        $authManager->addChild($updateOwnPost, $authManager->getPermission('view-user-details'));
        $authManager->addChild($updateOwnPost, $authManager->getPermission('update-dp'));

 
        // allow "author" to update their own posts
        $authManager->addChild($authManager->getRole('update-role'), $updateOwnPost);
    }*/

}

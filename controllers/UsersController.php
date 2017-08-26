<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\ImageUpload;
use app\models\Users;
use app\controllers\UsersSearchController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Imagine\Image\Box;
use yii\imagine\Image;
use yii\widgets\ActiveForm;


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
        $searchModel = new UsersSearchController();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Users();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) ) {
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->imageFile = UploadedFile::getInstance($model,'imageFile');
            $model->imageFile->saveAs('uploads/'. $model->imageFile->baseName.'.'.$model->imageFile->extension);
            $model->image = 'uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
            
            if($model->save()){
                Image::frame('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension)
                ->thumbnail(new box(400, 400))
                ->save('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension, ['quality' => 50]);
                return $this->redirect(['view', 'id' => $model->userid]);
            }else{
                return $this->render('create', [
                'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
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
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->imageFile = UploadedFile::getInstance($model,'imageFile');
            $model->imageFile->saveAs('uploads/'. $model->imageFile->baseName.'.'.$model->imageFile->extension);
            $model->image = 'uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
            if($model->save()){
                Image::frame('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension)
                ->thumbnail(new box(400, 400))
                ->save('uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension, ['quality' => 50]);
                return $this->redirect(['view', 'id' => $model->userid]);
            }else{
                return $this->render('create', [
                'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

}

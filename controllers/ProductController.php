<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductSpecs;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use app\models\Category;
use app\models\ProductQuestion;
use app\models\Questions;
use app\models\Users;
use yii\web\Response;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewProducts()
    {
        $product_query = Product::find();

        $category_query = Category::find();

        $pagination = new Pagination([
        'defaultPageSize' => 6,
        'totalCount'=> $product_query->count(),
        ]);

        $product = $product_query->orderBy('name')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        $category_query->joinWith('ps');

        $product_query->joinWith('cs');

        $category = $category_query->all();

        $this->layout = 'product';
        
        return $this->render('view_products',
        ['product'=>$product,
        'pagination'=>$pagination,
        'categorys'=>$category,
        ]);
    }

    public function actionViewSpecs($id)
    {
        $product_query = ProductSpecs::find();

        //$product_query->joinWith('productCategories');
        $product_query->joinWith('s');
        $product_query->joinWith('p');

        $product=$product_query->where(['product.pid' => $id])->all();

        
        
        if ($product!=null) {
            $this->layout = 'product';
            return $this->render('view_product_specs',
            ['product'=>$product]);
        } else {
            $this->layout = 'frontend';
            return $this->render('../site/index');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
          'model' => $this->findModel($id),
        ]);
    }

    public function actionValidateEmail()
    {
        $this->enableCsrfValidation = false;
        $email = Yii::$app->request->post('data');
        if(Yii::$app->user->isGuest){
            if(Users::find()->where(['email' => $email])->exists())
            echo 1;
            else echo 0;
        }
        else echo 0;
    }

    public function actionDisplayQuestions($id)
    {
        $question_query = ProductQuestion::find()->select('product_question.qid')->where(['pid' => $id , 'status' => true]);
        $question_query->joinWith('q');
        $questions = Questions::findAll($question_query);
        echo Json::encode($questions);
    }

    public function actionEnquiryForm()
    {
        $this->enableCsrfValidation = false;
        $data = Yii::$app->request->post('data');
        $mydata = json_decode($data , true);

        $status = 0;
        $user = Users::findByUsername($mydata[0]['email']);
        if(Yii::$app->user->isGuest){
            
            if(!$user){
                $user_table = Yii::$app->db->createCommand()->insert('users', [
                    'fname' => $mydata[0]['fname'],
                    'lname' => $mydata[0]['lname'],                    
                    'password' => Yii::$app->getSecurity()->generatePasswordHash("asd"),
                    'email' => $mydata[0]['email'],
                    'image' => 'uploads/default.png',
                ])->execute();

                $user = Users::findByUsername($mydata[0]['email']);

                $user_customer_table = Yii::$app->db->createCommand()->insert('user_customer' , [
                    'userid' => $user->userid,                    
                    'phone' => $mydata[0]['cno']
                ])->execute();

                if($user_table && $user_customer_table) $status = 1;
                else $status = 2;
            }
            else{
                $status = 3;
            }    
        }

        if($status==0 || $status==1 || $status==3 ){
            $userId = $user->userid;
            for($i=1 ; $i< sizeof($mydata); $i++){
            $ins = Yii::$app->db->createCommand()->insert('user_ans_questions' , [
                'uid' => $userId,
                'qid' => $mydata[$i]['qid'],
                'pid' => $mydata[$i]['pid'],
                'answer' => $mydata[$i]['answer']
            ])->execute();
            if(!$ins) { $status = 4; break;}
            else $status = 5;
            }
        }
        if($status == 2) echo "Error during User insertion";
        elseif($status == 4) echo "Error during answer insertion";
        elseif($status == 5) echo "Your data has been submitted";
        else echo "Error during insertion! Please try again.";

    }


    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'image');
            $model->file->saveAs('uploads/'.$model->name.'.'.$model->file->extension);
            $model->image = 'uploads/'.$model->name.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'image');
            $model->file->saveAs('uploads/'.$model->name.'.'.$model->file->extension);
            $model->image = 'uploads/'.$model->name.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}

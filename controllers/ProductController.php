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
use app\models\UserCustomer;
use app\models\Questions;
use app\models\Users;
use yii\web\Response;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
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
        'defaultPageSize' => 9,
        'totalCount'=> $product_query->count(),
        ]);

        $product = $product_query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->where(['status' => true])
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
        $product = Product::find()->where(['pid' => $id])->all(); ;
    
        
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
                    'password' => Yii::$app->getSecurity()->generatePasswordHash($mydata[0]['password']),
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
            	$temp_user = new Users();
                $user = $temp_user->findOne(['email' => $mydata[0]['email']]);
                $userid = $user->userid;
                $user->fname = $mydata[0]['fname'];
                $user->lname = $mydata[0]['lname'];
                $user_table = $user->save();
                

                $user_customer = new UserCustomer();
                $found_user_customer = $user_customer->findOne(['userid' => $userid]);
                $found_user_customer->phone = $mydata[0]['cno'];
                $user_customer_table = $found_user_customer->save();

                if($user_table && $user_customer_table) $status = 3;
                else $status = 2;
            }    
        }
        
        if(sizeof($mydata) == 1){
            //echo "This product has no questions related to it!";
        }
        else{
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
            elseif($status == 5) {
                $this->SendEmail($mydata,$user);
                echo "Your data has been submitted";
            }
            else echo "Error during insertion! Please try again.";
            }
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
        $model = $this->findModel($id);
        $model->status = 'false';
        $model->save();
        return $this->redirect(['view', 'id' => $model->pid]);
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


    protected function SendEmail($mydata,$user)
    {
        $data = "";
        $product = Product::findOne($mydata[1]['pid']);

        for($i=1; $i<sizeOf($mydata); $i++){
            if($mydata[$i]['answer'] != ""){
            $question = Questions::findOne($mydata[$i]['qid']);
            $data .= "<strong>" . $question->name . "</strong>" . " : " . $mydata[$i]['answer'] . "<br/>"; 
            }             
        } 

        //message to be sent to the user 
        $body = "You have successfully enquired about " . $product->name  . "Following were your submitted answers :" . $data . "We would reply to you as soon as possible";


        //message to be sent to the technical team 
        $msg = $user->fname . " " . $user->lname . " enquired about " . $product->name . "\n";
        $msg .= "Following are the user details\n";
        $msg .= "Email id : " . $user->email . "\n";
        $msg .= "Phone number : " . UserCustomer::findOne($user->id)->phone . "\n";
        $msg .= "Following are the questions answered\n";
        $msg .= $data;

        $to = $user->email;
        $subject = "Thank you for enquiring about our Product";
        $headers = "From: Salgaonkar Engineers";
        mail($to,$subject,$body,$headers);

        $to = 'castorgodinho@yahoo.in';
        $subject = "New Product Enquiry";
        mail($to,$subject,$msg);
    }


}

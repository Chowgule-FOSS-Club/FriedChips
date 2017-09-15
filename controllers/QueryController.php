<?php



namespace app\controllers;

use Yii;
use app\models\UserAnsQuestions;
use yii\helpers\Url;

class QueryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('check_query')){
            return $this->render('index');
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
        
    }

    public function actionChangeFlag($id){
        if(Yii::$app->user->can('check_query')){
            $queries = UserAnsQuestions::find()->where(['created_time' => $id])->all();
            foreach($queries as $query){
                $query->isRead = 'true';
                $query->update();
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionCount($id){
        if(Yii::$app->user->can('check_query')){
            $count= 0;
            $queries = UserAnsQuestions::find()->select('created_time')->distinct()->all();
            foreach($queries as $query){
                if(UserAnsQuestions::findOne(['created_time' => $query->created_time])->isRead == "false"){
                    $count++;
                }
            }
            //$count = UserAnsQuestions::find()->where(['isRead' => 'false'])->count();
            return $count;
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

}

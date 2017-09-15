<?php



namespace app\controllers;

use app\models\UserAnsQuestions;

class QueryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChangeFlag($id){
        $queries = UserAnsQuestions::find()->where(['created_time' => $id])->all();
        foreach($queries as $query){
            $query->isRead = 'true';
            $query->update();
        }
    }

    public function actionCount($id){
        $count= 0;
        $queries = UserAnsQuestions::find()->select('created_time')->distinct()->all();
        foreach($queries as $query){
            if(UserAnsQuestions::findOne(['created_time' => $query->created_time])->isRead == "false"){
                $count++;
            }
        }
        //$count = UserAnsQuestions::find()->where(['isRead' => 'false'])->count();
        return $count;
    }

}

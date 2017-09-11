<?php

namespace app\controllers;


use Yii;
use yii\data\ArrayDataProvider;
use app\models\roles\RulePermission;

class RulePermissionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $permissionRules = array(); 
        $authManager = Yii::$app->authManager;
        $permissions = $authManager->getPermissions();
        foreach($permissions as $permission){
            if($permission->ruleName != ""){
                array_push($permissionRules, $permission);
            }
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $permissionRules,
        ]);
        return $this->render(
            'index',
            ['dataProvider' => $dataProvider]
        );
    }

    public function actionCreate(){
        $model = new RulePermission();
        if($model->load(Yii::$app->request->post())){
            $authManager = Yii::$app->authManager;
            $permission = $authManager->getPermission($model->permission);
            $permission->ruleName = $model->ruleName;
            $authManager->update($model->permission, $permission);
            $permissionRules = array(); 
            $authManager = Yii::$app->authManager;
            $permissions = $authManager->getPermissions();
            foreach($permissions as $permission){
                if($permission->ruleName != ""){
                    array_push($permissionRules, $permission);
                }
            }
            $dataProvider = new ArrayDataProvider([
                'allModels' => $permissionRules,
            ]);
            return $this->render(
                'index',
                ['dataProvider' => $dataProvider]
            );        
        }else{
            return $this->render(
                'create',
                ['model' => $model]
            );
        }
    }

}

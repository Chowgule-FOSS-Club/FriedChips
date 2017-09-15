<?php

namespace app\controllers;

use Yii;
use app\models\roles\AuthItem;
use yii\data\ArrayDataProvider;
use yii\widgets\ActiveForm;
use yii\web\Response;

class RoleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            $roles = $authManager->getRoles();
            $provider = new ArrayDataProvider([
                    'allModels' => $roles,
                ]);
            return $this->render(
                'view-roles',
                ['model' => $provider]
            );
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionView($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            return $this->render('view', [
                'model' => $authManager->getRole($id),
            ]);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionCreateRole(){
        if(Yii::$app->user->can('RBAC')){
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
                return $this->render(
                    'view',
                    [
                        'model' => $model,
                    ]
                );
            }else{
                return $this->render(
                    'create-role',
                    [
                        'model' => $model,
                    ]
                );
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }

    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('RBAC')){
            $authManager = Yii::$app->authManager;
            $model = AuthItem::findOne($id);
            $model->permissions = $authManager->getPermissionsByRole($id);
            $model->scenario = "create-role";
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if($model->load(Yii::$app->request->post())){
                $authManager = Yii::$app->authManager;
                $role = $authManager->getRole($model->name);
                $authManager->removeChildren($role);
                foreach($model->permissions as $permission){
                    $fetchedPermission = $authManager->getPermission($permission);
                    $authManager->addChild($role, $fetchedPermission);
                }
                return $this->render(
                    'view',
                    [
                        'model' => $model,
                    ]
                );    
            }else{
                return $this->render(
                    'update-role',
                    [
                        'model' => $model,
                    ]
                );
            }
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('RBAC')){
            AuthItem::findOne($id)->delete();
            return $this->redirect(['index']);
        }else{
            Yii::$app->response->redirect(Url::to(['site/error-page'], true));
        }
    }
}

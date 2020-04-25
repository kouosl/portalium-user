<?php

namespace portalium\user\controllers\api;

use Yii;
use portalium\rest\ActiveController as RestActiveController;
use portalium\site\models\SignupForm;

class UsersController extends RestActiveController
{
	public $modelClass = 'portalium\user\models\User';

    public function actions() {
        $actions = parent::actions();
        unset($actions[ 'create' ]);

        return $actions;
    }

    public function actionCreate()
    {
        $model = new SignupForm();

        if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $user = $model->signup()){
            return ['access_token' => $user->access_token];
        }
        else
            return $this->modelError($model);
    }
}

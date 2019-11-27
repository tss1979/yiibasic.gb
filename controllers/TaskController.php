<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-27
 * Time: 18:22
 */

namespace app\controllers;



use app\models\Task;
use app\models\TaskForm;
use yii\helpers\VarDumper;

class TaskController extends \yii\web\Controller
{
    public function actionTask()
    {
        return $this->render('task');
    }

    public function actionForms()
    {
        $model  = new TaskForm();
        return $this->render('forms', ['model'=>$model]);
    }


}
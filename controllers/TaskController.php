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

    public function actionFillDb()
    {
        for($i=1; $i < 5; $i++)
        {
            \Yii::$app->db->createCommand()->insert('activity',
                [
                    'title'=> "$i Activity",
                    'created_at'=> time(),
                    'started_at'=> time() + $i * 60 * 60 * 24,
                    'finished_at'=> time() + ($i+1) * 60 * 60 * 24,
                    'cycle'=> false,
                    'main'=> false,
                    'author_id' => $i,
            ])->execute();
        }
    }

    public function actionFillDb2 ()
    {
        for($i=1; $i < 5; $i++)
        {
            \Yii::$app->db->createCommand()->insert('user',
                [
                    'username'=> "$i User",
                    'created_at'=> time(),
                    'password_hash'=> $i * 60 * 60 * 24,
                    'email'=> "user$i@mail.ru",
                    'auth_key' => '111',
                    'updated_at'=> time() + 2*60*24,

                ])->execute();
        }
    }


    public function actionFillUsers()
    {
        for($i = 1; $i < 5; $i++)
        {
            \Yii::$app->db->createCommand()->insert('users',
                [
                    'username'=> "$i User",
                    'password'=> $i . 'asdk' . $i*12 . 'qwe',
                ])->execute();
        }
    }


}
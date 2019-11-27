<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-27
 * Time: 20:50
 */

namespace app\models;


use yii\base\Model;

class TaskForm extends Model
{
public $beginTime;
public $endTime;
public $description;

public function rules()
{
    return [
        [['beginTime', 'endTime', 'description'], 'required'],
        [['description'], 'string'],
        [['beginTime', 'endTime'], 'time'],
    ];
}

public function attributeLabels()
{
    return [
        'beginTime'=>'Время начала',
        'endTime'=>'Время окончания',
        'description'=>'Описание'
    ];
}

public function actionForms()
{
 $model = new TaskForm();

 return $this->render('forms', ['model'=>$model]);
}

}
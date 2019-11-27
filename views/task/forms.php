<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-27
 * Time: 21:12
 */

/** @var app\models\TaskForm $model*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'method'=>'post',
    'action'=> Url::to(['task/task']),
    ]);
echo $form->field($model, 'beginTime')->input('time');
echo $form->field($model, 'endTime')->input('time');
echo $form->field($model, 'description')->textInput();
echo Html::submitButton('Отправить', ['class'=> 'btn btn-primary']);
ActiveForm::end();
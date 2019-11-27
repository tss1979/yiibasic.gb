<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-27
 * Time: 20:30
 */

namespace app\models;


use yii\base\Model;

class Task extends Model
{
    public $beginTime;
    public $endTime;
    public $description;

public function __construct(array $config = [])
{
    if (\Yii::$app->request->isPost) {
        $this->beginTime = $_POST['TaskForm']['beginTime'];
        $this->endTime = $_POST['TaskForm']['endTime'];
        $this->description = $_POST['TaskForm']['description'];
    } else {
            $this->beginTime = '11:00';
            $this->endTime = '12:00';
            $this->description = 'Task';
    }
}
}
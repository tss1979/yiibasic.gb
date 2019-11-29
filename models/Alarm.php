<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-29
 * Time: 21:07
 */

namespace app\models;


use yii\base\Model;

class Alarm extends Model
{
 public $alarm_name;
 public $alarm_start;
 public $alarm_end;
 public $repeat_alarm;

}
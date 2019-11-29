<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-24
 * Time: 00:42
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
 public $cycle;
 public $main;
 public $user_id;
 public $title;
 public $started_at;
 public $finished_at;
 public $created_at;
 public $updated_at;

}
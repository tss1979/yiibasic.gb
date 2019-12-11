<?php
namespace app\components;
use Yii;
use yii\base\Component;
class Seo extends Component
{
    public function registerTitle($value){
        Yii::$app->view->title = $value;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-12-09
 * Time: 21:40
 */
namespace app\components\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class CacheBahavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            ActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }
    public function deleteCache()
    {
        \Yii::$app->cache->delete(get_class($this->owner) . "_" . $this->owner->getPrimaryKey());
    }
}
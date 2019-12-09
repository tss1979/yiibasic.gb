<?php
namespace app\models;
use Yii;
use app\models\Calendar;
use Yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\db\Expression;
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 21/11/2019
 * Time: 20:57
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property int $started_at
 * @property int $finished_at
 * @property int $author_id
 * @property int $main
 * @property int $cycle
 * @property int $created_at
 * @property int $updated_at
 *
 *
 * @property User $author
 * @property Calendar[] $calendar
 * @property User[] $users - список всех пользователй из календаря
 */

class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }
    public $cycle;
    public $main;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['started_at', 'finished_at', 'author_id', 'main', 'cycle', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['finished_at'], 'checkFinishedAt'],
        ];
    }

    public function checkFinishedAt(){
        if(empty($this->finished_at) || $this->finished_at < $this->started_at) {
            $this->finished_at = $this->started_at;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'title' => 'Название',
            'started_at' => 'Дата и время начала',
            'finished_at' => 'Дата и время окончания',
            'author_id' => 'author ID',
            'main' => 'Блокирующее?',
            'cycle' => 'Повторяющееся?',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
    public function getCalendar()
    {
        return $this->hasMany(Calendar::className(), ['activity_id' => 'id']);
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()')
            ],
        ];
    }
    public static function findOne($condition)
    {
        if (Yii::$app->cache->exists(self::className() . '_' . $condition) === false) {
            $result = parent::findOne($condition);
            Yii::$app->cache->set(self::className() . '_' . $condition, $result);
            return $result;
        } else {
            return Yii::$app->cache->get(self::className() . '_' . $condition);
        }
    }
    /*  public function getUsers()
      {
          return  $this->hasMany(User::className(), ['id'=>'user_id'])
              ->via('calendar');
      }*/
}
<?php
namespace app\models;
use Yii;
use app\models\Calendar;
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
            'id' => 'ID',
            'title' => 'Title',
            'started_at' => 'Started At',
            'finished_at' => 'Finished At',
            'author_id' => 'author ID',
            'main' => 'Main',
            'cycle' => 'Cycle',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
    public function getCalendar()
    {
        return $this->hasMany(Calendar::class, ['activity_id' => 'id']);
    }

    public function getUsers()
    {
        return \app\models\ActivityDao::getById($id);
        return  $this->hasMany(User::class, ['id'=>'user_id'])
            ->via('calendar');
//        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('calendar', ['user_id' => 'id']);
    }
}
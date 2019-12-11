<?php
namespace app\commands;
use app\models\Activity;
use app\models\User;
use yii\console\Controller;
class AppController extends Controller
{
    /**создание начальных пользователей (admin manager user)
     *
     * php yii app/users
     */
    public function actionUsers()
    {
        $users = [
            'admin',
            'manager',
            'user',
        ];
        foreach ($users as $login){
            $user = new User([
                'username' => $login,
                'access_token' => "{$login}-token",
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $user->generateAuthKey();
            $user->password = "{$login}";
            $user->save();
        }
    }
    /**
     * создание начальных событий в календаре
     *
     * php yii app/activities
     */
    public function actionActivities()
    {
        $titles = [
            'Первое событие',
            'Второе событие',
            'Третье событие',
            'Unknown событие',
        ];
        $day = 1;
        $today = time();
        foreach ($titles as $title){
            $activityDate = date('Y-m-d', strtotime("+ {$day} days", $today));
            $activity = new Activity([
                'title' => $title,
                'description' => chunk_split(\Yii::$app->security->generateRandomString(64), random_int(10, 20), ' '),
                'userID' => random_int(1, 3),
                'dayStart' => $activityDate,
                'dayEnd' => $activityDate,
                'isBlocked' => random_int(0, 1),
                'cycle' => false,
            ]);
            $activity->save();
            $day++;
        }
    }
}
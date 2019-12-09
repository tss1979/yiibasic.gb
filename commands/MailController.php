<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-12-09
 * Time: 19:34
 */

namespace app\commands;


use yii\console\Controller;

class MailController extends Controller
{

    public function actionSendOut($email = null)
    {
        $activitiesQuery = Activity::find();
        if (!is_null($email)) {
            $activitiesQuery->joinWith('users')->where(['user.email' => $email]);
        }
        foreach ($activitiesQuery->each(100) as $activity) {
            foreach ($activity->users as $user) {
                $mailSend = \Yii::$app->mailer
                    ->compose('activity/notification-html', ['activity' => $activity])
                    ->setFrom('noreply@yii2basig.gb')
                    ->setSubject('Первое письмо')
                    ->setTo($user->email)->setCharset('UTF-8')
                    ->send();
                if ($mailSend === true) {
                    echo "message to $user->email было отправленно success {$activity->title}" . PHP_EOL;
                }
            }
        }
    }
}
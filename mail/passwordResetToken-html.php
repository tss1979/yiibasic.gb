<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-12-05
 * Time: 11:31
 */


use yii\helpers\Html;

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>
    <p>Follow the link below to reset your password:</p>
    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>

<?php
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

    Hello <?= $user->username ?>,
    Follow the link below to reset your password:

<?= $resetLink ?>
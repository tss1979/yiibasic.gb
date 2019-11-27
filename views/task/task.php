<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Task;

$task = new Task();

?>

<?= Html::a('Вернуться в Календарь', ['#'], ['class' => 'badge badge-secondary']) ?>
<?= Html::tag('ul','Список заданий на  день ', ['class' => 'list-group']) ?>
<?= Html::tag('li', Html::encode($task->beginTime), ['class' => 'list-group-item']) ?>
<?= Html::tag('li', Html::encode($task->endTime), ['class' => 'list-group-item']) ?>
<?= Html::tag('li', Html::encode($task->description), ['class' => 'list-group-item']) ?>
<?= Html::button('Изменить Задание', ['class' => 'btn btn-primary'])?>























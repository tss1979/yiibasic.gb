<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\DetailView;
/*<h2><?=Html::encode($model['title'])?></h2>
<h2><?=Html::encode($model['description'])?></h2>
<ul>
    <li><strong>Пользователь: </strong><?= $model['userID']?></li>
    <li><strong>Повтор: </strong><?= $model['cycle']?></li>
    <li><strong>Блокирующее: </strong><?= $model['isBlocked']?></li>
    <li><strong>Начало: </strong><?= $model['dayStart']?></li>
    <li><strong>Окончание: </strong><?= $model['dayEnd']?></li>
</ul>
*/
/**
 * @var View $this
 * @var Activity $model
 */
?>

<?= DetailView::widget([
    'model' => $model,
    'attributes'=> [
        //'id',
        [
            'label' => 'Порядковый номер',
            'attribute' => 'id',
            'value'=>function (Activity $model){
                return "{$model->id}";
            }
        ],
        'title',
        'started_at:datetime',
        'finished_at:date',
        [
            'attribute' => 'dateEnd',
            'value'=>function (Activity $model){
                return Yii::$app->formatter->asDate($model->dayEnd, 'php:Y');
            }
        ],
        /* лучше пользоватся способом ниже, но вылетает какая-то ошибка
        [
            'attribute' => 'dateEnd',
            'format' => ['date', 'php:Y'],
        ],*/
        'description',
        // 'userID',
        [
            'label' => 'Имя создателя',
            'attribute' => 'user.username'
        ],
        'isBlocked:boolean',
        'cycle:boolean',
    ],
]) ?>

<p><?= Html::a('Редактировать событие', "/activity/update?id={$model['id']}", ['class' => 'btn btn-success'] )  ?></p>

<p><?= Html::a('Вернуться в мои события', Url::to(['/activity/index']) ) ?></p>
<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>
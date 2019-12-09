<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            [
                'attribute'=>'created_at',
                'filter'=>\kartik\date\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'created_at',
                    'language'=>'ru',
                    'pluginOptions'=>[
                        'autoclose'=> true,
                        'todayHighlight'=>true,
                        'format'=>'dd.mm.yyy',
                    ],
                ]),
                'value'=>function(\app\models\User $model)
                {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                }

            ],
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

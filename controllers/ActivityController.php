
<?php
namespace app\controllers;
use Yii;
use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;
class ActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class, //ACF
                //'only' => ['index', 'view', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'submit'],
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }
    public function actionIndex($sort = false) {

        $query = Activity::find();
        if (!Yii::$app->user->can('admin')){
            $query->andWhere(['userID'=>Yii::$app->user->id]);
        }
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'validatePage' => false,
                'pageSize' => 5,
            ]
        ]);
        return $this->render('index', ['provider' => $provider]);
    }
    public function actionView(int $id) {

        $model = Activity::findOne($id);
        return $this->render('view',
            compact('model'));
    }
    public function actionCreate(){
        $model = new Activity();
        return $this->render('create',
            ['model' => $model]
        );
    }
    public function actionUpdate(int $id = null)
    {
        if(!empty($id)){
            $model = Activity::findOne($id);
            if($model->load(Yii::$app->request->post()) and $model->validate()){
                if($model->save()) {
                    return $this->redirect(["activity/view?id=$model->id"]);
                }
            }
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }
    public function actionSubmit() {
        $model = new Activity();
        if($model->load(Yii::$app->request->post())) {
            //$model->attachments = UploadedFile::getInstance($model, 'attachments');
            if ($model->validate()) {
                $model->save();
                //$query = new QueryBuilder(Yii::$app->db);
                //$params = [];
                //echo $query->insert('activities', $model->attributes, $params);
                return 'Success: ' . VarDumper::export($model->attributes);
            } else {
                return 'Failed: ' . VarDumper::export($model->errors);
            }
        }
        return 'Activity@Submit';
    }

}
<?php
use app\models\Car;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Car';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'name',
                'value' => function($car){
                    return  $car->name;
                },
                'label' => 'نام',
            ],
            [
                'attribute' => 'color',
                'value' => function($car){
                    return  $car->color;
                },
                'label' => 'رنگ',
            ],
            [
                'attribute' => 'user',
                'value' => 'user.name',
                'label' => 'نام کاربر',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Car $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 } 
            ],
        ],
    ]); ?>
<p>
        <?= Html::a('Create Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>

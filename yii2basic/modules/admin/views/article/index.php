<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            [
                'attribute' =>'category',
                'value' => 'category.title', //getCategory()->title
                'filter' => $categories,
            ],
            'date',
            [
                'format' => 'html',
                'label' => 'Изображение',
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width' => 200]);
                }
            ],
            ['attribute' => 'status', 'filter' => [0 =>'Неактивно', 1=> 'Активно']],
            // 'image',
            // 'viewed',
            // 'user_id',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dictionary entries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add Entry'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Add Category'), ['createcategory'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Add Language'), ['createlanguage'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'category_id',
            //'language_id',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
            ],
            [
                'attribute' => 'language_id',
                'value' => 'language.name',
            ],
            'name',
            'translation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

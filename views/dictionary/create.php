<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dictionary */

$this->title = Yii::t('app', 'Create Dictionary');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>$categories,
        'languages'=>$languages
    ]) ?>

</div>

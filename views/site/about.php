<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Language;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
 
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

<?php
$language1 =  Language::findOne(1);
$languages =  Language::findBySql('SELECT * FROM language')->all();
?>
<hr>
<p>
	Found Language 1 Name: <?= $language1->name?><br>
	Language count: <?= count($languages)?><br>
</p>
<hr>


 

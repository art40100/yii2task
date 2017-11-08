<?php 
namespace app\components;
 
 
use Yii;
use yii\base\Behavior;
use yii\base\Component;
use yii\base\InvalidConfigException;

 //idea taken from this tutorial https://www.youtube.com/watch?v=_qNMcJKoEK0
class checkCookie extends Behavior
{
 public function events()
 {
 	return [
 		\yii\web\Application::EVENT_BEFORE_REQUEST => 'changeLanguage',
 	];
 }
//checks cookie and sets language   triggered before an application handles a request
 public function changeLanguage()
 {
 	if (Yii::$app->getRequest()->getCookies()->has('languageCode')){
 		Yii::$app->language =Yii::$app->getRequest()->getCookies()->getValue('languageCode');
 	}
 	
 }
 
}
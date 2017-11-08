<?php

namespace app\controllers;

use Yii;
use app\models\Dictionary;
use app\models\DictionarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Language;

/**
 * DictionaryController implements the CRUD actions for Dictionary model.
 */
class DictionaryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dictionary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DictionarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dictionary model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
 
        ]);
    }

    /**
     * Creates a new Dictionary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dictionary();
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        $languages = ArrayHelper::map(Language::find()->all(), 'id', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories'=>$categories,
                'languages'=>$languages
            ]);
        }
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatecategory()
    {
        $category = new Category();
     
        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['index', 'id' => $category->id]);
        } else {
            return $this->render('createcat', [
                'category' => $category,
                 
            ]);
        }
    }

    /**
     * Creates a new Language model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatelanguage()
    {
        $language = new Language();
         
        if ($language->load(Yii::$app->request->post()) && $language->save()) {
            return $this->redirect(['index', 'id' => $language->id]);
        } else {
            return $this->render('createlang', [
                'language' => $language,
                
            ]);
        }
    }

    /**
     * Changes the app language to the value received in POST
     * Also sets a cookie with language code
     */
    public function actionLanguage()
    {
        if(isset($_POST['languageCode']))
        {

             
            Yii::$app->language = $_POST['languageCode'];
            $langCookie = new yii\web\Cookie([
                'name'=> 'languageCode',
                'value'=>$_POST['languageCode'],
            ]);

            Yii::$app->getResponse()->getCookies()->add($langCookie);
        }
    }

    /**
     * Updates an existing Dictionary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        $languages = ArrayHelper::map(Language::find()->all(), 'id', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories'=>$categories,
                'languages'=>$languages,
            ]);
        }
    }

    /**
     * Deletes an existing Dictionary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dictionary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dictionary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dictionary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

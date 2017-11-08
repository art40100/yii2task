<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dictionary;

/**
 * DictionarySearch represents the model behind the search form about `app\models\Dictionary`.
 */
class DictionarySearch extends Dictionary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category_id', 'language_id', 'name', 'translation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dictionary::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                //set to low number for demonstration
                //will only display 5 data items (rows in gridview)
                'pagesize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //include the relations(related tables) in the  query
        $query->joinWith('category');
        $query->joinWith('language');

           //enable sorting by category name
        $dataProvider->sort->attributes['category_id'] = [
 
        'asc' => ['category.name' => SORT_ASC],
        'desc' => ['category.name' => SORT_DESC],
        ];

         //enable sorting by language name
        $dataProvider->sort->attributes['language_id'] = [
       
        'asc' => ['language.name' => SORT_ASC],
        'desc' => ['language.name' => SORT_DESC],
        ];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'category_id' => $this->category_id,
           // 'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'dictionary.name', $this->name])
            ->andFilterWhere(['like', 'translation', $this->translation])
            ->andFilterWhere(['like', 'category.name', $this->category_id])
            ->andFilterWhere(['like', 'language.name', $this->language_id]);

        return $dataProvider;
    }
}

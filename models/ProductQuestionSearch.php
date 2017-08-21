<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductQuestion;

/**
 * ProductQuestionSearch represents the model behind the search form about `app\models\ProductQuestion`.
 */
class ProductQuestionSearch extends ProductQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'status','pid', 'qid'], 'safe'],
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
        $query = ProductQuestion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
       $query->joinWith('p');
    $query->joinWith('q');

        $query->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'questions.name', $this->qid])
            ->andFilterWhere(['like', 'product.name', $this->pid]);

        return $dataProvider;
    }
}

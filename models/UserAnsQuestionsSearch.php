<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserAnsQuestions;

/**
 * UserAnsQuestionsSearch represents the model behind the search form about `app\models\UserAnsQuestions`.
 */
class UserAnsQuestionsSearch extends UserAnsQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'qid', 'pid'], 'string'],
            [['answer'], 'safe'],
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
        $query = UserAnsQuestions::find();

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
       $query->joinWith('user');

       $query->andFilterWhere(['like', 'product.name', $this->pid])
       ->andFilterWhere(['like', 'questions.name', $this->qid])
       ->andFilterWhere(['like', 'users.email', $this->userid])
       ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}

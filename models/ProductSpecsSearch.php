<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductSpecs;

/**
 * ProductSpecsSearch represents the model behind the search form about `app\models\ProductSpecs`.
 */
class ProductSpecsSearch extends ProductSpecs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'pid','value', 'status'], 'safe'],
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
        $query = ProductSpecs::find();

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

        $query->joinWith('p');
        $query->joinWith('s');

     

        $query->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'product.name', $this->pid])
            ->andFilterWhere(['like', 'specification.name', $this->sid]);

        return $dataProvider;
    }
}

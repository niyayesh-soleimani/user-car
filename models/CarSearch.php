<?php
namespace app\models;
use yii\data\ActiveDataProvider;
class CarSearch extends Car
{
    public $user;
    public $car;
    public static function tableName()
    {
        return 'car';
    }
    public function rules()
    {
        return [
            [['user','user'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = Car::find(); 
        $query->joinWith(['user']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        if (!empty($params['CarSearch'])) {
            $this->load($params);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query, 
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'user.name', $this->user]);
        $query->andFilterWhere(['like', 'car.name', $this->name]);
        $query->andFilterWhere(['like', 'car.color', $this->color]);
        return $dataProvider;
    }
}







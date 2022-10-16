<?php
namespace app\models;
use yii\db\ActiveRecord;
class User extends ActiveRecord
{
    public $userId;
    public function rules()
    {
        return [
            [['name', 'lastname'], 'required'],
        ];
    }
    public function getCar()
    {
        return $this->hasMany(Car::class, ['user_id' => 'id']);
    }

}
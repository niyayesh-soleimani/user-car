<?php
namespace app\models;
use yii\db\ActiveRecord;
class Car extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'color', 'user_id'], 'required'],
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}


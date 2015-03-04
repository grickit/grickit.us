<?php

namespace front\models;

use Yii;

class thing extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_things';
    }

    public function rules() {
        return [
            [['name', 'nameSafe', 'linkURL', 'description'], 'required'],
            [['activeStatus'], 'integer', 'max' => 1],
            [['name'], 'string', 'max' => 50],
            [['linkURL'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 2000]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'activeStatus' => 'Is active?',
            'voteCount' => 'Likes',
            'linkURL' => 'Link',
            'description' => 'Description'
        ];
    }

}
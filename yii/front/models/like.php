<?php

namespace front\models;

use Yii;

class like extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_likes';
    }

    public function rules() {
        return [];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'modelType' => 'Type',
            'modelName' => 'Name',
            'createAddr' => 'IP Address'
        ];
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->createAddr = $_SERVER['REMOTE_ADDR'];

        return parent::init();
    }

    public function beforeSave($insert) {
        $this->updateDate = date('Y-m-d H:i:s',time());
     
        return parent::beforeSave($insert);
    }

}
<?php

namespace front\models;

use Yii;
use common\components\SafeName;

class tag extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_tags';
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name', 'modelType', 'modelID'],
            'update' => ['name']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'nameSafe' => 'Internal Name',
            'modelType' => 'Type',
            'modelID' => 'Name'
        ];
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->updateDate = date('Y-m-d H:i:s',time());

        return parent::init();
    }

    public function beforeSave($insert) {
        if($this->scenario === 'update') {
            $this->updateDate = date('Y-m-d H:i:s',time());
        }
        elseif($this->scenario === 'create') {
            $this->nameSafe = SafeName::make($this->name);
        }

        return parent::beforeSave($insert);
    }

}
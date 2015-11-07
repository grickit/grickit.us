<?php

namespace common\models;

use Yii;

class permission_scope extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'common_permission_scopes';
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name'],
            'update' => ['name']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
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

        return parent::beforeSave($insert);
    }

}
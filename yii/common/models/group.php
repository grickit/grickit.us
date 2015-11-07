<?php

namespace common\models;

use Yii;
use common\components\SafeName;
use common\models\user;

class group extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'common_groups';
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
            'nameSafe' => 'Internal Name',
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

    public function getUsers() {
        return $this->hasMany(User::className(), ['id' => 'userID'])->viaTable('common_group_users', ['groupID' => 'id']);
    }

}
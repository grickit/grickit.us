<?php

namespace front\models;

use Yii;

class thing extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_things';
    }

    public function rules() {
        return [
            [['name', 'nameSafe', 'description'], 'required'],
            [['activeStatus', 'publishedStatus'], 'integer', 'max' => 1],
            [['name'], 'string', 'max' => 50],
            [['linkURL'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 2000]
        ];
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name', 'nameSafe', 'description', 'linkURL', 'activeStatus', 'publishedStatus'],
            'update' => ['name', 'description', 'linkURL', 'activeStatus', 'publishedStatus']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'activeStatus' => 'Is active?',
            'publishStatus' => 'Publish on index?',
            'voteCount' => 'Likes',
            'linkURL' => 'Link',
            'description' => 'Description'
        ];
    }

    public function findLike() {
        if(($like = like::find()
            ->where(['=','modelType','thing'])
            ->andWhere(['=','modelName',$this->nameSafe])
            ->andWhere(['=','createAddr',$_SERVER['REMOTE_ADDR']])
            ->andWhere(['>=','createDate',date('Y-m-d H:i:s',time()-604800)])
            ->one()) !== null) {
            return $like;
        }
        else {
            return false;
        }
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->updateDate = date('Y-m-d H:i:s',time());
        $this->activeStatus = 1;
        $this->publishedStatus = 1;

        return parent::init();
    }

    public function beforeSave($insert) {
        if($this->scenario === 'update') {
            $this->updateDate = date('Y-m-d H:i:s',time());
        }

        return parent::beforeSave($insert);
    }

}
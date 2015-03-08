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

    public function findLike() {
        /*if (($like = like::findOne(['modelType' => 'thing', 'modelName' => $this->nameSafe, 'createAddr' => $_SERVER['REMOTE_ADDR'], 'createDate' < ])) !== null) {
            return $like;
        }*/
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
        $this->activeStatus = 1;

        return parent::init();
    }

    public function beforeSave($insert) {
        $this->updateDate = date('Y-m-d H:i:s',time());
     
        return parent::beforeSave($insert);
    }

}
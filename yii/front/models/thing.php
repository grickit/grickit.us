<?php

namespace front\models;

use Yii;
use common\components\SafeName;

class thing extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_things';
    }

    public function rules() {
        return [
            [['name', 'content'], 'required'],
            [['activeStatus', 'publishedStatus'], 'integer', 'max' => 1],
            [['name'], 'string', 'max' => 100],
            [['linkURL'], 'string', 'max' => 300],
            [['content'], 'string', 'max' => 10000]
        ];
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name', 'content', 'linkURL', 'activeStatus', 'publishedStatus'],
            'update' => ['name', 'content', 'linkURL', 'activeStatus', 'publishedStatus']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'nameSafe' => 'Internal Name',
            'linkURL' => 'Link',
            'content' => 'Description',
            'voteCount' => 'Likes',
            'activeStatus' => 'Is active?',
            'publishStatus' => 'Publish publicly?'

        ];
    }

    public function findLike() {
        if(($like = like::find()
            ->where(['=','modelType','thing'])
            ->andWhere(['=','modelID',$this->id])
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
        elseif($this->scenario === 'create') {
            $this->nameSafe = SafeName::make($this->name);
        }

        return parent::beforeSave($insert);
    }

}
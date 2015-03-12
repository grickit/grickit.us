<?php

namespace front\models;

use Yii;
use front\models\like;
use common\components\SafeName;

class article extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'front_articles';
    }

    public function rules() {
        return [
            [['name', 'content'], 'required'],
            [['publishedStatus'], 'integer', 'max' => 1],
            [['name'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 10000]
        ];
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name', 'content', 'publishedStatus'],
            'update' => ['name', 'content', 'publishedStatus']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'nameSafe' => 'Internal Name',
            'content' => 'Content',
            'voteCount' => 'Likes',
            'activeStatus' => 'Is active?',
            'publishStatus' => 'Publish publicly?',
        ];
    }

    public function getLike() {
        return $this->hasOne(like::className(),['modelID' => 'id'])
            ->where(['=','modelType',$this->className()])
            ->andWhere(['=','createAddr',$_SERVER['REMOTE_ADDR']])
            ->andWhere(['>=','createDate',date('Y-m-d H:i:s',time()-604800)])
            ->one();
    }

    public function like() {
        if($this->like === null) {
            $like = new like();
            $like->modelType = $this->className();
            $like->modelID = $this->id;
            if($like->save()) {
                $this->voteCount++;
                return true;
            }
        }
        return false;
    }

    public function unlike() {
        if(($like = $this->like) !== null) {
            if($like->delete()) {
                $this->voteCount--;
                return true;
            }
        }
        return false;
    }

    public function getSummary() {
        if(preg_match("/^<p>(.+)<\/p>/U",$this->content,$matches) === 1) {
            return $matches[0];
        }
        return '';
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->updateDate = date('Y-m-d H:i:s',time());
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
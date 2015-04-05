<?php

namespace union\models;

use Yii;
use common\components\SafeName;

class category extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'union_categories';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['publishedStatus'], 'integer', 'max' => 1],
            [['priceGlobal'], 'double', 'min' => 1.00],
            [['name'], 'string', 'max' => 100],
            [['note'], 'string', 'max' => 1000],
            [['content'], 'string', 'max' => 5000]
        ];
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['name', 'content', 'notes', 'type', 'priceGlobal', 'order', 'publishedStatus'],
            'update' => ['name', 'content', 'notes', 'type', 'priceGlobal', 'order', 'publishedStatus']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'name' => 'Name',
            'nameSafe' => 'Internal Name',
            'content' => 'Description',
            'notes' => 'Notes (displayed under the name)',
            'type' => 'What type of category is this?',
            'priceGlobal' => 'Do all items in this category have the same price? (Set empty to disable)',
            'order' => 'What order are the categories listed in?',
            'publishedStatus' => 'Publish publicly?'
        ];
    }

    public function getFormattedPrice() {
        return '$'.number_format($this->priceGlobal,2);
    }

    public function getFormattedNotes() {
        $string = '<p>'.$this->notes.'</p>';
        $pattern = '![\r\n]{2,}!';
        $replacement = '</p><p>';
        return preg_replace($pattern,$replacement,$string);
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
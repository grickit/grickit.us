<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

use common\components\SafeName;
use common\models\group;


class User extends \yii\db\ActiveRecord implements IdentityInterface {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $updatePassword;
    public $confirmPassword;

    public static function tableName() {
        return 'common_users';
    }

    public function rules() {
        return [
            [['username','name'], 'string', 'max' => 100],
            [['email'],'string', 'max' => 100],
            ['activeStatus', 'default', 'value' => 1],
            ['activeStatus', 'in', 'range' => [self::STATUS_INACTIVE, self::STATUS_ACTIVE]],
        ];
    }

    public function scenarios() {
        return [
            'default' => [],
            'create' => ['username', 'name', 'email', 'updatePassword', 'confirmPassword', 'activeStatus', 'adminStatus'],
            'update' => ['username', 'name', 'email', 'updatePassword', 'confirmPassword', 'activeStatus', 'adminStatus']
        ];
    }

    public function attributeLabels() {
        return [
            'updatePassword' => 'Set Password',
            'id' => 'ID',
            'createDate' => 'Created',
            'updateDate' => 'Last Updated',
            'username' => 'Username',
            'name' => 'Name',
            'nameSafe' => 'Internal Name',
            'passwordSalt' => 'Salt String',
            'passwordHash' => 'Hashed Password',
            'authKey' => 'Authorization Key',
            'resetKey' => 'Password Reset Key',
            'activeStatus' => 'Is active?',
            'adminStatus' => 'Is administrator?'
        ];
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'activeStatus' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['nameSafe' => $username, 'activeStatus' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'resetKey' => $token,
            'activeStatus' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->passwordHash);
    }

    public function setPassword($password) {
        $this->passwordHash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey() {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken() {
        $this->resetKey = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken() {
        $this->resetKey = null;
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->updateDate = date('Y-m-d H:i:s',time());
        $this->activeStatus = 0;
        $this->adminStatus = 0;

        return parent::init();
    }

    public function validate() {
        if($this->updatePassword !== '' && $this->updatePassword !== $this->confirmPassword) {
            $this->addError('confirmPassword','Passwords must match.');
        }

        return parent::validate(null,false);
    }

    public function beforeSave($insert) {
        if($this->scenario === 'update') {
            $this->updateDate = date('Y-m-d H:i:s',time());
        }
        elseif($this->scenario === 'create') {
          if(!$this->name) $this->name = $this->username;
          $this->nameSafe = SafeName::make($this->username);
        }

        if($this->updatePassword !== '') $this->setPassword($this->updatePassword);

        return parent::beforeSave($insert);
    }

    public function getGroups() {
        return $this->hasMany(Group::className(), ['id' => 'groupID'])->viaTable('common_group_users', ['userID' => 'id']);
    }

}

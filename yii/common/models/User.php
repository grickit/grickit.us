<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName() {
        return 'common_users';
    }

    public function rules() {
        return [
            ['statusActive', 'default', 'value' => 1],
            ['statusActive', 'in', 'range' => [self::STATUS_INACTIVE, self::STATUS_ACTIVE]],
        ];
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'statusActive' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['nameSafe' => $username, 'statusActive' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'statusActive' => self::STATUS_ACTIVE,
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
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public function init() {
        $this->createDate = date('Y-m-d H:i:s',time());
        $this->updateDate = date('Y-m-d H:i:s',time());

        return parent::init();
    }

    public function beforeSave($insert) {
        if($this->scenario === 'create') {
            $this->name = $this->username;
            $this->nameSafe = SafeName::make($this->name);
        }

        return parent::beforeSave($insert);
    }
}

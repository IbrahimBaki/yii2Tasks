<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "new_user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class NewUser extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'string', 'max' => 80],
            [['password','authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
//            'authKey' => 'Auth Key',
//            'accessToken' => 'Access Token',
        ];
    }

    public function store()
    {
        $this->username = $_POST['NewUser']['username'];
        $this->email = $_POST['NewUser']['email'];
        $this->password =password_hash($_POST['NewUser']['password'],PASSWORD_ARGON2I);
        $this->authKey =md5(random_bytes(5));
        $this->accessToken =password_hash(random_bytes(10),PASSWORD_DEFAULT);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token,$type=null)
    {
        return self::findOne(['accessToken'=>$token]);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return password_verify($password , $this->password);
    }
}

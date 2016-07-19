<?php

namespace app\models;

use yii\base\Model;
use Yii;

class EditInfoForm extends Model
{
    public $username;
    public $email;
    public $oldPassword;
    public $newPassword;
    public $newPasswordRepeat;

    public function __construct()
    {
        parent::__construct();
        $this->username = Yii::$app->user->identity->username;
        $this->email = Yii::$app->user->identity->email;
    }

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['oldPassword', 'required'],
            ['oldPassword', 'validatePassword'],
            
            ['newPassword', 'compare', 'compareAttribute'=>'newPasswordRepeat', 'skipOnEmpty' => true, 'message'=>"Введенные пароли не совпадают" ],
            
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'oldPassword' => 'Текущий пароль',
            'newPassword' => 'Новый пароль',
            'newPasswordRepeat' => 'Повтор нового пароля',
        ];
    }

    public function saveUserData() {

        $user = User::findOne(Yii::$app->user->identity->id);
        $user->username = $this->username;

        if (!$user->validate()) {
            Yii::$app->session->setFlash('error','Ошибка проверки данных пользователя');
            return false;
        }

        if (!$user->save()) {
            Yii::$app->session->setFlash('error','Ошибка сохранения данных пользователя');
            return false;
        }

        return true;

    }

    public function validatePassword()
    {

        $user = User::findOne(Yii::$app->user->identity->id);

        if (!$user->validatePassword($this->oldPassword)) {
            $this->addError('oldPassword', 'Неверный пароль.');
        }

    }
}
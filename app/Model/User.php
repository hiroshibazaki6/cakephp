<?php
App::uses('AppModel','Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
    public $hasMany = 'Post';

    public $validate = array(
                'name' => array(
                        'rule' => array('between',4,20),
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => '名前は４文字以上２０文字以内で入力してください'
                        ),
                'username' => array(
                    'rule1' => array(
                        'rule' => array('between',4,20),
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => 'ユーザー名は４文字以上２０文字以内で入力してください'
                            ),
                    'rule2' => array(
                        'rule' => 'alphaNumeric',
                        'message' => 'ユーザー名は英数字のみで入力してください',
                        ),
                    'rule3' => array(
                        'rule' => 'isUnique',
                        'message' => '入力したユーザーはすでに存在しています'
                        )
                        ),
                'password' => array(
                    'rule1' => array(
                        'rule' => array('between',4,8),
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => 'パスワードは４文字以上８文字以内で入力してください'
                        ),
                    'rule2' => array(
                        'rule' => 'alphaNumeric',
                        'message' => 'パスワードは英数字のみで入力してください'
                        ),
                    'rule3' => array(
                        'rule' => 'passwordConfirm',
                        'message' => 'パスワードが一致していません'
                        )
                    ),
                'password_Confirm' => array(
                        'rule' => 'notBlank',
                        'message' => 'パスワード（確認）を入力してください'
                    ),
                'mail' => array(
                    'rule1' => array(
                        'rule' => 'email',
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => '入力したメールアドレスに間違いがあります'
                            ),
                    'rule2' => array(
                        'rule' => array('maxLength',100),
                        'message' => 'メールアドレスは100文字以下で入力してください'
                        )
                        )
                    );

    public function passwordConfirm($check){
        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['User']['password'] === $this->data['User']['password_Confirm']){
            return true;
        }else{
            return false;
        }
    }

    public function beforeSave($options = array()) {                       // beforeSave(): 保存する前に行う処理
        if (isset($this->data[$this->alias]['password'])) {                // SimplePasswordHasherを適用させます
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

}
<?php
class Post extends AppModel{
    public $belongsTo = 'User';

    public $validate = array(
        'body' => array(
            'rule' => array('maxLength',140),
            'required' => true,
            'allowEmpty' =>false,
            'message' => '140文字以内で入力してください'
            )
        );
}
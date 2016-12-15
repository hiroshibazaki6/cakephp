<h2>ログイン画面</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('User.username',array('label' => 'ユーザー名'));
echo $this->Form->input('User.password',array('label' => 'パスワード'));
echo $this->Form->end('ログインする');
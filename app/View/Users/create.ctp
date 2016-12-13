<div id="login">
<h2>ついったーに参加しよう</h2>
<p>もうついったーに登録していますか？<?php echo $this->Html->link('ログイン','/Users/login'); ?></p>
</div>
<?php
echo $this->Form->create('User');
echo $this->Form->input('User.name',array('label' => '名前'));
echo $this->Form->input('User.username',array('label' => 'ユーザー名'));
echo $this->Form->input('User.password',array('label' => 'パスワード'));
echo $this->Form->input('User.password_Confirm',array('label' => 'パスワード（確認用）','type' => 'password'));
echo $this->Form->input('User.mail',array('label' => 'メールアドレス'));
echo $this->Form->end('登録する');
?>


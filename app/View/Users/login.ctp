<div id="content">
    <div id="create_nav">
    <p>ユーザー登録（無料）</p>
    <?php echo $this->Html->link('ユーザー登録','/Users/create'); ?>
    </div>
<h2>ログイン画面</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('User.username',array('label' => 'ユーザー名'));
echo $this->Form->input('User.password',array('label' => 'パスワード'));
echo $this->Form->end('ログインする');
?>
</div>
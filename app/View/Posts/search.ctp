<h2>友だちを見つけて、フォローしましょう！</h2>
<p>ついったーに登録済みの友達を検索できます。</p>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('User.username', ['label' => '誰を検索しますか？']);
    echo $this->Form->end('検索');
?>
<h2>登録ユーザー一覧</h2>
<table>
    <tr>
        <th>名前</th>
        <th>ユーザー名</th>
        <th>フォロー</th>
    </tr>
    <?php    foreach ($data as $row): ?>
    <tr>
        <th><?php echo h($row['User']['name']); ?></th>
        <th><?php echo h($row['User']['username']); ?></th>
        <th><?php echo $this->Form->postLink('フォローする',['action' => 'follow',$row['User']['id']],['confirm' => 'フォローしますか？']); ?></th>
    </tr>
    <?php endforeach; ?>
</table>
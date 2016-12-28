<h2>フォローワー一覧</h2>
<?php echo "フォロワーは".$count."人います"; ?>
<table>
    <tr>
        <th>名前</th>
        <th>ユーザー</th>
    </tr>
    <?php foreach ($data as $row): ?>
    <tr>
    <th><?php echo h($row['User']['name']); ?></th>
    <th><?php echo h($row['User']['username']); ?></th>
    </tr>
    <?php endforeach; ?>
</table>
    <?php echo $this->Html->link('マイページに戻る','/posts/mypage');
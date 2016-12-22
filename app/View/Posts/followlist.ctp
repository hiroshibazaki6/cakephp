<h2>フォロー一覧</h2>
<table>
    <tr>
        <th>名前</th>
        <th>ユーザー</th>
        <th>フォローを解除</th>
    </tr>
    <?php foreach ($data as $row): ?>
    <tr>
    <th><?php echo h($row['User']['name']); ?></th>
    <th><?php echo h($row['User']['username']); ?></th>
    <th>フォローを解除する</th>
    </tr>
    <?php endforeach; ?>
</table>
    <?php echo $this->Html->link('マイページに戻る','/posts/mypage');
<?php
echo $this->Form->create('Post');
echo $this->Form->input('Post.body',array('label'=>'いまなにしてる？  ※140文字以内で入力してください','rows' => 2));
echo $this->Form->end('ツイートする');
?>
<table>
<?php foreach ($comments as $row): ?>
    <tr>
        <th><?php echo h($row['User']['username']); ?></th>
        <th><h2><?php echo h($row['Post']['body']); ?></h2></th>
        <th><?php echo h($row['Post']['created']); ?></th>
        <th><?php echo $this->Form->postLink('削除',array('action' => 'delete',$row['Post']['id']),array('confirm' => '削除しますか？')); ?></th>
    </tr>
<?php endforeach; ?>
</table>
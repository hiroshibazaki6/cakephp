<?php
echo $this->Form->create('Post');
echo $this->Form->input('Post.body',array('label'=>'いまなにしてる？  ※140文字以内で入力してください','rows' => 2));
echo $this->Form->end('ツイートする');
?>
<table>
<?php foreach ($comments as $row): ?>
    <ul>
        <li><h2><?php echo h($row['Post']['body']); ?></h2></li>
        <li><?php echo h($row['Post']['created']); ?></li>
        <li><?php echo $this->Form->postLink('削除',array('action' => 'delete',$row['Post']['id']),array('confirm' => '削除しますか？')); ?></li>
    </ul>
<?php endforeach; ?>
</table>
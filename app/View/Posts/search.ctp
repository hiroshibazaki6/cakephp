<h2>友だちを見つけて、フォローしましょう！</h2>
<p>ついったーに登録済みの友達を検索できます。</p>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('Username',array('label' => '誰を検索しますか？'));
    echo $this->Form->end('検索');
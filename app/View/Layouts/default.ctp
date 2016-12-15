<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'ついったー（仮）'; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
		<div id="header">
                    <h1>
                        <?php echo $this->Html->link('home','/'); ?>
                    </h1>
			<div id="nav">
			<?php if(is_null($logged_in)): ?>
				<ul>
					<li><?php echo $this->Html->link('ホーム','/Posts/mypage'); ?></li>
					<li><?php echo $this->Html->link('ユーザー登録','/Users/create'); ?></li>
					<li><?php echo $this->Html->link('ログイン','/Users/login'); ?></li>
				</ul>
			<?php else : ?>
				<ul>
					<li><?php echo $this->Html->link('ホーム','/Posts/mypage'); ?></li>
					<li><?php echo $this->Html->link('友だちを検索','/Posts/search'); ?></li>
					<li><?php echo $this->Html->link('ログアウト','/Users/logout'); ?></li>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	<div id="container">
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

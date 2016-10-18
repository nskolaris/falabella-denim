<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('general');
		echo $this->Html->css('home');
		echo $this->Html->script('http://code.jquery.com/jquery-latest.min.js');
		echo $this->Html->script('easySlider1.7.js');
		echo $this->Html->script('masonry.pkgd.min.js');
		echo $this->Html->script('waitfor.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="logo"></div>
			<?php echo $this->Element('menu'); ?>
			<?php echo $this->Element('slider-header'); ?>
		</div>
		<div id="content" style="position: relative; height: 2458px;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer"></div>
	</div>
	<?php echo $this->Element('slider-lookbook'); ?>
	<?php echo $this->Element('slider-recital'); ?>
	<?php echo $this->Element('slider-tips'); ?>
	<?php echo $this->Element('black_overlay'); ?>
</body>
</html>

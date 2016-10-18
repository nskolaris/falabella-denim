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
		echo $this->Html->css('concurso');
		echo $this->Html->script('http://connect.facebook.net/en_US/all.js');
		echo $this->Html->script('http://code.jquery.com/jquery-latest.min.js');
		echo $this->Html->script('inVite/main.js');
		//echo $this->Html->script('inVite/invite.js');
		echo $this->Html->script('inVite/plugins.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->Element('fb_header'); ?>
	<div id="container" class="concurso <?php echo $this->params['controller'].'-'.$this->action; ?> <?php echo $this->passedArgs[0]; ?>">
		<div id="header">
			<?php echo $this->Html->link('', array('controller'=>'pages','action'=>'home'),array('class'=>'logo')); ?>
			<?php echo $this->Element('menu'); ?>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>

<div class="menu">
	<?php echo $this->Html->link('', array('controller'=>'catalogo','action'=>'index'),array('class'=>'btn-catalogo')); ?>
	<?php echo $this->Html->link('', array('controller'=>'concurso','action'=>'home','jeans'),array('class'=>'btn-concurso')); ?>
	<?php echo $this->Html->link('', array('controller'=>'concurso','action'=>'home','looks'),array('class'=>'btn-entradas')); ?>
	<?php echo $this->Html->link('', 'javascript:void(0);',array('onClick'=>'openTipsSlider();','class'=>'btn-tips')); ?>
</div>
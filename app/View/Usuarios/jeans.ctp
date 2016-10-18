<script>
	function submitForm(){
		$('#UsuarioAddForm').submit();
	}
	
	function selectBanda(index){
		$('.banda').removeClass('selected');
		$('#banda-'+index).addClass('selected');
		$('#UsuarioConciertoId').val(index);
	}
	
	function showBanda(index){
		$('#image-banda-'+index).fadeIn('slow',function(){});
	}
	
	function hideBanda(index){
		$('#image-banda-'+index).fadeOut('slow',function(){});
	}
</script>
<div class="form-container">
	<div class="desc">Llená el formulario con tus datos para participar</div>
	<?php echo $this->Form->create('Usuario');?>
	<div><?php echo $this->Form->input('nombre',array('class'=>'field','label'=>'Nombre','div'=>'','value'=>$user['nombre']));?></div>
	<div><?php echo $this->Form->input('apellido',array('class'=>'field','label'=>'Apellido','div'=>'','value'=>$user['apellido']));?></div>
	<div><?php echo $this->Form->input('dni',array('class'=>'field','label'=>'DNI','div'=>''));?></div>
	<div><?php echo $this->Form->input('email',array('class'=>'field','label'=>'Email','div'=>'','value'=>$user['email']));?></div>
	<div><?php echo $this->Form->input('birthyear', array('class'=>'field','label'=>'Año de nacimiento','options' => $anos, 'default' => 'Año','value'=>$user['birthyear']));?></div>
	<div><?php echo $this->Form->input('gender', array('class'=>'field','label'=>'sexo','options' => $sexos, 'default' => 'Sexo','value'=>$user['gender']));?></div>
	<div>
		<p>Banda que quiero ver</p>
		<div class="bandas">
			<a class="banda" id="banda-0" href="javascript:void(0);" onMouseOut="hideBanda(0);" onMouseOver="showBanda(0);" onClick="selectBanda(0);">Tán Biónica</a>
			<a class="banda" id="banda-1" href="javascript:void(0);" onMouseOut="hideBanda(1);" onMouseOver="showBanda(1);" onClick="selectBanda(1);">Blur</a>
			<a class="banda" id="banda-2" href="javascript:void(0);" onMouseOut="hideBanda(2);" onMouseOver="showBanda(2);" onClick="selectBanda(2);">Ciro y los persas</a>
		</div>
	</div>
	<?php echo $this->Form->hidden('concierto_id'); ?>
	<?php echo $this->Form->hidden('concurso',array('value'=>'jeans')); ?>
	<?php echo $this->Form->end(); ?>
	<?php echo $this->Html->link('','javascript:void(0);',array('class'=>'btn-enviar','onClick'=>'submitForm();')); ?>
</div>
<div class="image-banda" id="image-banda-0" style="background-image:url(<?php echo $this->webroot; ?>img/concurso/tanbionica.png);"></div>
<div class="image-banda" id="image-banda-1" style="background-image:url(<?php echo $this->webroot; ?>img/concurso/blur.png);"></div>
<div class="image-banda" id="image-banda-2" style="background-image:url(<?php echo $this->webroot; ?>img/concurso/ciro.png);"></div>
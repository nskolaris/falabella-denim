<script>
	$(document).ready(function(){
		$('#UsuarioNombre').attr("placeholder", "Nombre");
		$('#UsuarioApellido').attr("placeholder", "Apellido");
		$('#UsuarioDni').attr("placeholder", "DNI");
		$('#UsuarioEmail').attr("placeholder", "Email");
		$('#UsuarioCodigo').attr("placeholder", "Código del jean");
	});
	
	function submitForm(){
		$('#UsuarioAddForm').submit();
	}
</script>
<div class="left">
	<h1>Regístrate con el código de tu jean, elegí el look que más te guste y ganá entradas VIP para Tan Biónica en el</h1>
	<h2>Quilmes Rock.</h2>
</div>
<div class="form-container">
	<div class="desc">Llena el formulario</div>
	<?php echo $this->Form->create('Usuario');?>
	<div><?php echo $this->Form->input('nombre',array('class'=>'field','label'=>'','div'=>'','value'=>$user['nombre']));?></div>
	<div><?php echo $this->Form->input('apellido',array('class'=>'field','label'=>'','div'=>'','value'=>$user['apellido']));?></div>
	<div><?php echo $this->Form->input('dni',array('class'=>'field','label'=>'','div'=>''));?></div>
	<div><?php echo $this->Form->input('email',array('class'=>'field','label'=>'','div'=>'','value'=>$user['email']));?></div>
	<div><?php echo $this->Form->input('birthyear', array('class'=>'field','label'=>'','options' => $anos, 'default' => 'Año','value'=>$user['birthyear']));?></div>
	<div><?php echo $this->Form->input('gender', array('class'=>'field','label'=>'','options' => $sexos, 'default' => 'Sexo','value'=>$user['gender']));?></div>
	<div><?php echo $this->Form->input('codigo',array('class'=>'field','label'=>'','div'=>''));?></div>
	<?php echo $this->Form->hidden('concurso',array('value'=>'looks')); ?>
	<?php echo $this->Form->end(); ?>
	<?php echo $this->Html->link('','javascript:void(0);',array('class'=>'btn-enviar','onClick'=>'submitForm();')); ?>
</div>
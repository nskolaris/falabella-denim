<?php if (isset($invite_data)){ ?>
<script>
	function registerChance(){
		fbLogin(); //Permisos y seteo de datos por js
		AjaxLogin(); //Registro u obtengo el nuevo usuario por ajax
	}

	function AjaxLogin(){
		if (userData==null){
			setTimeout(AjaxLogin,500);
		}else{
			jQuery.post("../../usuarios/AjaxLogin", userData, function(data) {
				if (data!='error'){
					var datos = JSON.parse(data).Usuario;
					_FBvite={page:{id:'179615465545205'},site:{id:'14'},campaign:{id:'18'}};
					_vite_site_id = _FBvite.site.id, _vite_customer = {}, _vite_callback = convertionCallback;
					_vite_customer = {
						email:datos.email,
						first_name: datos.nombre,
						last_name: datos.apellido,
						id: datos.id,
						juego_id:'<?php echo $invite_data['Juego']['id']?>',
						concurso_id: 2
					};
					jQuery.post("../../juegos/checkChance/<?php echo $invite_data['Juego']['id']; ?>", datos, function(data) {
						console.log(data);
						if(data=='true'){
							reportConvertion();
						}
					});
					reportConvertion();
					$('#dar-chance').fadeOut('slow', function(){});
					$('#gracias').fadeIn('slow', function(){});
				}
			});
		}
	}
</script>
<?php } ?>
<?php if (!isset($invite_data)){ ?>
	<p class="desc">Encontrá la otra mitad de tu jean y ganá entradas para el recital que quieras en el Quilmes Rock</p>
	<?php echo $this->Html->link('', 'javascript:void(0);', array('class'=>'btn-jugar','onClick'=>'fbLogin("'.$this->webroot.'juegos/add/jeans");')); ?>
<?php }else{ ?>
	<div id="dar-chance">
		<div class="box-inviter">
			<div class="img" style="background-image:url(http://graph.facebook.com/<?php echo $invite_data['Usuario']['fbid']; ?>/picture?type=large);"></div>
			<p class="nombre"><?php echo $invite_data['Usuario']['nombre'].' '.$invite_data['Usuario']['apellido']; ?></p>
			<p class="desc">Te pide que l<?php echo ($invite_data['Usuario']['gender']=='f'?'a':'o'); ?> ayudes a ganarse las entradas para el quilmes rock.</p>
		</div>
		<?php echo $this->Html->link('', 'javascript:void(0);', array('class'=>'btn-chance','onClick'=>'registerChance();')); ?>
	</div>
	<div id="gracias">
		<p class="desc">¡Ya le diste una chance a tu amigo ahora participá por las entradas!</p>
		<?php echo $this->Html->link('', 'javascript:void(0);', array('class'=>'btn-jugar','onClick'=>'fbLogin("'.$this->webroot.'juegos/add/jeans");')); ?>
	</div>
<?php } ?>
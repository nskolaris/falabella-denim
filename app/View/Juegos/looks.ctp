<script>
	var invitation_url;

	function saveGame(selectedIndex){
		_FBvite={page:{id:'179615465545205'},site:{id:'15'},campaign:{id:'19'}};
		_vite_site_id=_FBvite.site.id,_vite_customer={},_vite_callback=convertionCallback;
		_vite_customer={
			email:'<?php echo $user['email']; ?>',
			first_name:'<?php echo $user['nombre']; ?>',
			last_name:'<?php echo $user['apellido']; ?>',
			id:'<?php echo $user['id']; ?>',
			concurso_id:'2',
			look_id:selectedIndex
		};
		reportConvertion();
		getInviteUrl();
	}
	
	function getInviteUrl(){
		jQuery.post("../../juegos/getGame/<?php echo $user['id']; ?>/2", null, function(data) {
			if (data!='error'){
				if (data != 'false'){
					var juego = JSON.parse(data);
					invitation_url = juego.invite_url;
					jQuery('.botones').fadeIn("slow",function(){});
				}else{setTimeout(getInviteUrl,500);}
			}
		});
	}
</script>
<script>
	<?php if($played){ ?>
	jQuery(document).ready(function(){
		getInviteUrl();
		jQuery('#content').addClass('exito');
		jQuery('.juego').hide();
		jQuery('.finish').show();
	});
	<?php } ?>
	function Finish(index){
		saveGame(index);
		jQuery('#content').addClass('exito');
		jQuery('.juego').fadeOut("slow",function(){});
		jQuery('.finish').fadeIn("slow",function(){});
	}
</script>
<div class="juego">
<?php $looks = array('1','2','3','4','5','6'); ?>
<?php foreach ($looks as $look){ ?>
	<div id="look-<?php echo $look; ?>" style="background-image:url(../../img/looks/looks/look-<?php echo $look; ?>.jpg);" onMouseOver="jQuery('#votar-<?php echo $look; ?>').show();jQuery('#look-<?php echo $look; ?>').addClass('selected');" onMouseOut="jQuery('#votar-<?php echo $look; ?>').hide();jQuery('#look-<?php echo $look; ?>').removeClass('selected');">
		<a id="votar-<?php echo $look; ?>" href="javascript:void(0);" onClick="Finish('<?php echo $look; ?>');"></a>
	</div>
<?php } ?>
</div>
<div class="finish left">
	<h1>¡Ya estas participando!<br>Invitá amigos a jugar y ganá más chances</h1>
	<div class="botones">
		<a class="fb" href="javascript:void(0);" onclick="share(event);" data-media="facebook"></a>
		<a class="tw" href="javascript:void(0);" onclick="share(event);" data-media="twitter"></a>
	</div>
</div>
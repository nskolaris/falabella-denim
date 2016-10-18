<script>
	var invitation_url;
	
	function saveGame(){
		_FBvite={page:{id:'179615465545205'},site:{id:'14'},campaign:{id:'18'}};
		_vite_site_id=_FBvite.site.id,_vite_customer={},_vite_callback=convertionCallback;
		_vite_customer={
			email:'<?php echo $user['email']; ?>',
			first_name:'<?php echo $user['nombre']; ?>',
			last_name:'<?php echo $user['apellido']; ?>',
			id:'<?php echo $user['id']; ?>',
			concurso_id:'1',
		};
		reportConvertion();
		getInviteUrl();
	}
	function getInviteUrl(){
		jQuery.post("../../juegos/getGame/<?php echo $user['id']; ?>/1", null, function(data) {
			if (data!='error'){
				if (data != 'false'){
					var juego = JSON.parse(data);
					invitation_url = juego.invite_url;
					jQuery('.botones').fadeIn("slow",function(){});
				}else{setTimeout(getInviteUrl,500);}
			}
		});
	}

	<?php if($played){ ?>
	jQuery(document).ready(function(){
		getInviteUrl();
		jQuery('.btn-jugar').fadeOut('slow', function(){});
		jQuery('.ganaste').fadeIn('slow', function(){});
		jQuery('.desc').text('¡ya estás participando por dos entradas para el quilmes rock!');
	});
	<?php } ?>
	
</script>
<script>
	var accel = 0;
	var vel = 0;
	var maxVel = 50;
	var minVel = 5;
	var fijoId;
	var spinning = false;
	var stopindex;
	var rolls = 0;
	
	function rollJeans(){
		rolls++
		if(rolls>4){stopindex = fijoId;}else{stopindex = Math.floor((Math.random()*10)+1);}
		jQuery('.btn-jugar').fadeOut('slow', function(){});
		spinning = true;
		startSlide();
		window.setTimeout(stopSlide,5000);
	}
	
	function startSlide(){
		if (vel<maxVel){accel = accel + 1;}else{accel=0;}
		vel = vel + accel;
		
		var actualMargin = jQuery('.first').css('margin-top');
		var newMargin = parseInt(actualMargin)-vel+'px';
		
		jQuery('.first').css('margin-top',newMargin);
		
		var lastTop = jQuery('.last').position().top;
		if(lastTop<=0){jQuery('.first').css('margin-top','0px');}
		
		if(spinning){window.setTimeout(startSlide,16);}
	}
	
	function getResult(){
		if(fijoId == stopindex){ //gano
			saveGame();
			jQuery('.ganaste').fadeIn('slow', function(){});
			jQuery('.desc').text('¡ya estás participando por dos entradas para el quilmes rock!');
		}else{
			jQuery('.btn-jugar.denuevo').fadeIn('slow', function(){});
		}
	
	}
	
	function stopSlide(){
		spinning = false;
		var finishTop = jQuery('#slide-'+stopindex).position().top;
		accel = -0.3;

		vel = vel + accel;

		var actualMargin = jQuery('.first').css('margin-top');
		var newMargin = parseInt(actualMargin)-vel+'px';
		
		if ((finishTop<50)&&(finishTop>-50)){
			actualMargin = jQuery('.first').css('margin-top');
			newMargin = parseInt(actualMargin)-finishTop+'px';
			jQuery('.first').css('margin-top',newMargin);
			getResult();
			return 0;
		}
		jQuery('.first').css('margin-top',newMargin);
		
		var lastTop = jQuery('.last').position().top;
		if(lastTop<=0){jQuery('.first').css('margin-top','0px');}
		
		if (vel>0){window.setTimeout(stopSlide,16);}
	}
</script>
<div class="juego">
	<p class="desc">¡juntá las dos partes iguales del jean y participá del sorteo!</p>
	<?php echo $this->Html->link('', 'javascript:void(0);', array('onClick'=>'rollJeans();','class'=>'btn-jugar')); ?>
	<?php echo $this->Html->link('', 'javascript:void(0);', array('onClick'=>'rollJeans();','class'=>'btn-jugar denuevo')); ?>
	<div class="jeans-container">
		<?php $jean_fijo_id = rand(1, 5); ?>
		<script>fijoId = <?php echo $jean_fijo_id; ?>;</script>
		<div class="jean-fijo" style="background-image:url(../../img/concurso/slide/jean-fijo-<?php echo $jean_fijo_id; ?>.png)"></div>
		<div class="mitades">
		<div class="mitad first" style="background-image:url(../../img/concurso/slide/jean-1.png);"></div>
		<?php for($i=2;$i<11;$i++){ ?>
			<div id="slide-<?php echo $i; ?>" class="mitad" style="background-image:url(../../img/concurso/slide/jean-<?php echo $i; ?>.png);"></div>
		<?php } ?>
		<div id="slide-1" class="mitad last" style="background-image:url(../../img/concurso/slide/jean-1.png);"></div>
		</div>
	</div>
	<div class="ganaste">
		<div class="botones" style="display:none;">
			<a class="fb" href="javascript:void(0);" onclick="share(event);" data-media="facebook"></a>
			<a class="tw" href="javascript:void(0);" onclick="share(event);" data-media="twitter"></a>
		</div>
	</div>
</div>
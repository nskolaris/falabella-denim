<script>
	var recitalopen = false;

	function openRecitalSlider(){
		$('.black-overlay').fadeIn('slow', function(){});
		$('#slider-recital-container').fadeIn('slow', function(){});
		if (!recitalopen){
			recitalopen = true;
			setTimeout(function(){$("#slider-recital").easySlider({auto: true,continuous: true,nextId:'nextRecital',nextText:'',prevId:'prevRecital',prevText:''});},15);
		 }
	}
	
	function closeRecitalSlider(){
		 $('.black-overlay').fadeOut('slow', function(){});
		 $('#slider-recital-container').fadeOut('slow', function(){});
	}
</script>
<?php $looks = array('1','2','3'); ?>
<div id="slider-recital-container">
<div id="slider-recital-content">
	<div id="slider-recital">
		<ul class="images">
		<?php foreach($looks as $look): ?>
			<li>
				<img src="<?php echo $this->webroot; ?>img/slider/recital/recital-img-<?php echo $look; ?>.jpg" />
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
	<a class="btn-cerrar" href="javascript:void(0);" onClick="closeRecitalSlider();"></a>
</div>
</div>
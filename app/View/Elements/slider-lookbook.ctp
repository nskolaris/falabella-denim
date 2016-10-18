<script>
	var lookbookopen = false;

	function openLookbook(){
		$('.black-overlay').fadeIn('slow', function(){});
		$('#slider-lookbook-container').fadeIn('slow', function(){});
		if (!lookbookopen){
			lookbookopen = true;
			setTimeout(function(){$("#slider-lookbook").easySlider({auto: true,continuous: true,nextId:'nextLook',nextText:'',prevId:'prevLook',prevText:''});},15);
		}
	}
	
	function closeLookbook(){
		 $('.black-overlay').fadeOut('slow', function(){});
		 $('#slider-lookbook-container').fadeOut('slow', function(){});
	}
</script>
<?php $looks = array('01','02','03','04','05'); ?>
<div id="slider-lookbook-container">
	<div id="slider-lookbook-content">
	<div id="slider-lookbook">
		<ul class="images">
		<?php for($i=1;$i<39;$i++){ ?>
			<li>
				<img src="<?php echo $this->webroot; ?>img/slider/lookbook/lookbook-img-<?php echo $i; ?>.jpg" />
			</li>
		<?php } ?>
		</ul>
	</div>
	<a class="btn-cerrar" href="javascript:void(0);" onClick="closeLookbook();"></a>
	</div>
</div>
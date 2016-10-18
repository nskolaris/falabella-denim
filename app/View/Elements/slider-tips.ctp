<script>
	var tipsopen = false;

	function openTipsSlider(){
		$('.black-overlay').fadeIn('slow', function(){});
		$('#slider-tips-container').fadeIn('slow', function(){});
		if (!tipsopen){
			tipsopen = true;
			setTimeout(function(){$("#slider-tips").easySlider({auto: true,continuous: true,nextId:'nextTip',nextText:'',prevId:'prevTip',prevText:''});},15);
		 }
	}
	
	function closeTipsSlider(){
		 $('.black-overlay').fadeOut('slow', function(){});
		 $('#slider-tips-container').fadeOut('slow', function(){});
	}
</script>
<?php $tips = array('1','2','3','4','5','6','7'); ?>
<div id="slider-tips-container">
<div id="slider-tips-content">
	<div id="slider-tips">
		<ul class="images">
		<?php foreach($tips as $tip): ?>
			<li>
				<img src="<?php echo $this->webroot; ?>img/tips/tip-<?php echo $tip; ?>.png" />
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
	<a class="btn-cerrar" href="javascript:void(0);" onClick="closeTipsSlider();"></a>
	</div>
</div>
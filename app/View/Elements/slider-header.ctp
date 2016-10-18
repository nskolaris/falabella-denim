<script>$(document).ready(function(){
	$("#slider-header").easySlider({
		auto: true,
		continuous: true,
		controlsShow: true,
		speed: 1000,
		pause: 6000,
		nextText:'',prevText:''
	});
});

	function showControls(){
		$('#prevBtn').fadeIn('slow',function(){});
		$('#nextBtn').fadeIn('slow',function(){});
	}
	
	function hideControls(){
		$('#prevBtn').fadeOut('slow',function(){});
		$('#nextBtn').fadeOut('slow',function(){});
	}
</script>
<?php $images = array('01','02','03','04','05','06','07'); ?>
<div id="slider-header" onMouseOver="showControls();" onMouseOut="hideControls();">
	<ul class="images">
	<?php foreach($images as $image): ?>
		<li>
			<div style="background-image:url('<?php echo $this->webroot; ?>img/slider/header/slide<?php echo $image; ?>.jpg');"></div>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
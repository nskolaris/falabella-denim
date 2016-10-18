<script>
$(document).ready(function() {
	var $content = $('#content');
	$content.waitForImages(function() {
		console.log('home images loaded');
		$content.masonry({
			/*columnWidth: 310,*/
			gutter: 9,
			itemSelector: '.item'
		});
	});
});
</script>
<a class="item" href="<?php echo $this->webroot; ?>concurso/home/jeans"><img src="<?php echo $this->webroot; ?>img/concurso-jeans.jpg"></a>
<a class="item" href="<?php echo $this->webroot; ?>catalogo"><img src="<?php echo $this->webroot; ?>img/catalogo-01.jpg"></a>
<a class="item" href="<?php echo $this->webroot; ?>concurso/home/looks"><img src="<?php echo $this->webroot; ?>img/concurso-looks.jpg"></a>
<img class="item" src="<?php echo $this->webroot; ?>img/img_video.jpg">
<img class="item" src="<?php echo $this->webroot; ?>img/gif_pileta.gif">
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-01.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-03.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openTipsSlider();"><img src="<?php echo $this->webroot; ?>img/home-img-05.jpg"></a>
<img class="item" src="<?php echo $this->webroot; ?>img/gif_caminata.gif">
<img class="item" src="<?php echo $this->webroot; ?>img/gif_baile.gif">
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-04.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openRecitalSlider();"><img src="<?php echo $this->webroot; ?>img/home-img-16.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-02.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-05.jpg"></a>
<a class="item" href="<?php echo $this->webroot; ?>catalogo"><img src="<?php echo $this->webroot; ?>img/catalogo-02.jpg"></a>
<img class="item" src="<?php echo $this->webroot; ?>img/gif_baile2.gif">
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-06.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-07.jpg"></a>
<a class="item" href="<?php echo $this->webroot; ?>catalogo"><img src="<?php echo $this->webroot; ?>img/catalogo-03.jpg"></a>
<a class="item" href="javascript:void(0);" onClick="openLookbook();"><img src="<?php echo $this->webroot; ?>img/lookbook-08.jpg"></a>
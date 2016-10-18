<div class="articulos">
<?php foreach($articulos as $articulo ){ ?>
<div class="articulo">
	<div class="img" style="background-image: url(img/articulos/<?php echo $articulo['Articulo']['img_name']; ?>);"></div>
	<p class="nombre"><?php echo $articulo['Articulo']['nombre']; ?></p> - <p class="marca"><?php echo $articulo['Articulo']['marca']; ?></p><br>
	<p class="precio">$<?php echo $articulo['Articulo']['precio']; ?></p>
</div>
<?php } ?>
</div>
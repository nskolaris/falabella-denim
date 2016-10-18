Cantidad de usuarios: <?php echo count($usuarios); ?>
<table>
<tr><td>Id</td><td>InVite Url</td><td>Nombre</td><td>Apellido</td><td>E-mail</td><td>dni</td><td>Género</td><td>Fecha de nacimiento</td><td>Facebook Id</td><td>fecha de creacion</td></tr>
<?php foreach($usuarios as $usuario){ ?>
<tr>
	<td><?php echo $usuario['Usuario']['id']; ?></td>
	<td><?php echo $usuario['Usuario']['invite_url']; ?></td>
	<td><?php echo $usuario['Usuario']['nombre']; ?></td>
	<td><?php echo $usuario['Usuario']['apellido']; ?></td>
	<td><?php echo $usuario['Usuario']['email']; ?></td>
	<td><?php echo $usuario['Usuario']['dni']; ?></td>
	<td><?php echo $usuario['Usuario']['gender']; ?></td>
	<td><?php echo $usuario['Usuario']['birthday']; ?></td>
	<td><?php echo $usuario['Usuario']['fbid']; ?></td>
	<td><?php echo $usuario['Usuario']['created']; ?></td>
</tr>
<?php } ?>
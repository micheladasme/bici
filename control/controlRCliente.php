<?php
	// Incluir Funciones.
	include_once('../modelo/funciones.php');

	// Obtenemos los Datos.
	$rut = $_POST['rut'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$nick = $_POST['nick'];
	$contraseña = $_POST['contraseña'];
	$comuna = $_POST['comuna'];

	

	// Verificamos que el producto no exista.
	$existe = existeCliente($correo);
	if($existe == '1')
	{
	?>
		<script>
			alert('ERROR: El usuario con correo <?php echo $correo?> ya existe.');

			window.location="../vista/vista_inicio.php";
		</script>
<?php
	}
	else{
	// Ejecutamos las funciones.
	$clientes = AgregaClientes($rut, $nombre, $apellido, $direccion, $telefono, $correo, $nick, $contraseña, $comuna);

	// Verificamos que se hallan insertado los datos.
	if($clientes == 1)
	{
	?>
		<script>
			// Alert informando.
			alert('El usuario <?php echo $nick?> ha sido registrado correctamente.');

			// Redirigmos a ver Productos.
			window.location="../vista/vista_inicio.php";
		</script>
<?php
	}
	}
?>
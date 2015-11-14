<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_usuarios.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = eliminaUsuario($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('El usuario ha sido eliminado exitosamente.');
			window.location = '../vista/vista_ver_usuarios.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('No se pudo eliminar el Usuario.');
			window.location = '../vista/vista_ver_usuarios.php';
		</script>
<?php
	}

?>
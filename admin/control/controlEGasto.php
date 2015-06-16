<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_gastos.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = eliminaGasto($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('El Gasto ha sido eliminado exitosamente.');
			window.location = '../vista/vista_ver_gasto.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('ERROR: No se pudo eliminar el gasto, intente nuevamente.');
			window.location = '../vista/vista_ver_gasto.php';
		</script>
<?php
	}

?>
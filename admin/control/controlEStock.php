<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_stock.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = eliminaStock($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('El Stock ha sido eliminado exitosamente.');
			window.location = '../vista/vista_stock_general.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('ERROR: No se pudo eliminar el stock, intente nuevamente.');
			window.location = '../vista/vista_stock_general.php';
		</script>
<?php
	}

?>
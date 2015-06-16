<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_promocion.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = eliminaPromocion($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('La Promocion ha sido eliminada exitosamente.');
			window.location = '../vista/vista_ver_promocion.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('No se pudo eliminar la Promocion, Primero elimine Stock de la Promocion.');
			window.location = '../vista/vista_eliminar_promocion.php';
		</script>
<?php
	}

?>
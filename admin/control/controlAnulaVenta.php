<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_venta.php');

	// Obtener Variables
	$id = $_GET['id'];

	// Ejecutar la función
	$anular = anulaVenta($id);

	// Verificamos si se elimino
	if($anular == '1')
	{
	?>
		<script>
			alert('La Venta ha sido anulada exitosamente.');
			window.location = '../vista/vista_ver_venta.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('ERROR: No se pudo anular la Venta, intente nuevamente.');
			window.location = '../vista/vista_ver_venta.php';
		</script>
<?php
	}

?>
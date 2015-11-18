<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_productos.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = activaProducto($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('El producto ha sido activado exitosamente.');
			window.location = '../vista/vista_ver_producto_anulado.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('No se pudo activar el Producto.');
			window.location = '../vista/vista_ver_producto_anulado.php';
		</script>
<?php
	}

?>
<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_productos.php');

	// Obtener Variables
	$codigo = $_GET['codigo'];

	// Ejecutar la función
	$eliminar = eliminaProducto($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	?>
		<script>
			alert('El producto ha sido eliminado exitosamente.');
			window.location = '../vista/vista_ver_producto.php';
		</script>
<?php	
	}else
	{
		// Si no se elimino, enviamos un error.
	?>
		<script>
			alert('No se pudo eliminar el Producto, Primero elimine Stock del Producto.');
			window.location = '../vista/vista_eliminar_producto';
		</script>
<?php
	}

?>
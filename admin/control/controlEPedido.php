<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_pedidos.php');

	// Obtener Variables
	$codigo = $_POST['codigo'];

	// Ejecutar la función
	$eliminar = anulaPedido($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{

	
			echo('El Pedido ha sido eliminado exitosamente.');
		
	
	}else
	{
		// Si no se elimino, enviamos un error.
	
		echo('No se pudo eliminar el Pedido.');
			
		
	}

?>
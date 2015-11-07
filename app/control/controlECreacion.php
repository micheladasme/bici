<?php
	
	// Incluir Funciones
	include_once('../modelo/funciones.php');

	// Obtener Variables
	$codigo = $_POST['codigo'];

	// Ejecutar la función
	$eliminar = eliminarCreaciones($codigo);

	// Verificamos si se elimino
	if($eliminar == '1')
	{
	
	 echo('La Bicicleta ha sido eliminado exitosamente.');
	
	}else
	{
		// Si no se elimino, enviamos un error.
	
	echo('No se puede Eliminar la bicicleta, Intente Nuevamente.');
			
	}

?>
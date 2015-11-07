<?php
	
	// Incluir Funciones
	include_once('../modelo/funciones.php');

	// Obtener Variables
	$codigo = $_POST['codigo'];

	// Ejecutar la función
	$armado = pedirArmado($codigo);

	// Verificamos si se elimino
	if($armado == '1')
	{
	
	 echo('El armado de la Bicicleta ha sido solicitada exitosamente.');
	
	}else
	{
		// Si no se elimino, enviamos un error.
	
	echo('No se puede solicitar el armado la bicicleta, Intente Nuevamente.');
			
	}

?>
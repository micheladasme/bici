<?php
	
	// Incluir Funciones
	include_once('../modelo/modelo_pedidos.php');

	// Obtener Variables
	$codigo = $_POST['codigo'];
	$estado = $_POST['estado'];

	// Ejecutar la función
	$sgteEstado = updateEstado($codigo,$estado);

	// Verificamos si se elimino
	if($sgteEstado == '1')
	{
	
	 echo('Se ha cambiado de estado exitosamente.');
	
	}else
	{
		// Si no se elimino, enviamos un error.
	
	echo('No se puede cambiar el estado, Intente Nuevamente.');
			
	}

?>
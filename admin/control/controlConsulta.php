<?php
	$producto=array();
	// Incluir Funciones.
	include('../modelo/modelo_productos.php');
	// Obtenemos los Datos.
	$codigo = $_POST['txt_consulta'];	
	$producto = buscaProducto($codigo);
	
?>
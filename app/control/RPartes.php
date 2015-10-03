<?php

//query: select * from productos where pro_cod IN (17,9,2)

// insertar id (con otros datos correspondientes) a tabla temporal de pedidos
// y luego consultar tabla temporal combianada con productos, enviar respuesta a ajax  

session_start();
//include_once("../modelo/modelo_armado.php");

$datos = $_POST; 


	if(!isset($_SESSION["bicicleta"]))
	{

	$_SESSION["bicicleta"] = $datos;
    }
    else
    {
 	array_push($_SESSION["bicicleta"], $datos);
    }

//print_r($datos);

//print_r(($_SESSION["bicicleta"]));


echo implode(', ', array_map(function ($entry) {
  return $entry['parte'];
}, $_SESSION["bicicleta"]));

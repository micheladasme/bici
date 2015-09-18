<?php
session_start();
//include_once("../modelo/modelo_armado.php");
include("array_table.php");
$datos = $_POST; 


	if(!isset($_SESSION["bicicleta"]))
	{
	$_SESSION["bicicleta"] = $datos;
    }
    else
    {
    array_push($_SESSION["bicicleta"], $datos);
    }

//print_r($_SESSION["bicicleta"]);
print_r(array2table($_SESSION["bicicleta"]));

?>

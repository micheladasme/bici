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

foreach ($_SESSION["bicicleta"] as $row) {
print(isset($row["neumatico"])?$row["neumatico"]:"");
print(isset($row["neumatico"])?",".$row["neumatico"]:"");
print(isset($row["llanta"])?",".$row["llanta"]:"");
print(isset($row["llanta"])?",".$row["llanta"]:"");
print(isset($row["frenoTra"])?",".$row["frenoTra"]:"");
print(isset($row["marco"])?",".$row["marco"]:"");
print(isset($row["pinon"])?",".$row["pinon"]:"");
print(isset($row["cambioTra"])?",".$row["cambioTra"]:"");
print(isset($row["horquilla"])?",".$row["horquilla"]:"");
print(isset($row["sillin"])?",".$row["tija"]:"");	
print(isset($row["platos"])?",".$row["platos"]:"");
print(isset($row["cadena"])?",".$row["cadena"]:"");
print(isset($row["pedal"])?",".$row["pedal"]:"");
print(isset($row["manubrio"])?",".$row["manubrio"]:"");
print(isset($row["manillar"])?",".$row["manillar"]:"");
print(isset($row["frenosDel"])?",".$row["frenosDel"]:"");
print(isset($row["mando"])?",".$row["mando"]:"");
print(isset($row["accesorios"])?",".$row["accesorios"]:"");
}


?>

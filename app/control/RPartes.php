<?php

//query: select * from productos where pro_cod IN (17,9,2)

// insertar id (con otros datos correspondientes) a tabla temporal de pedidos
// y luego consultar tabla temporal combianada con productos, enviar respuesta a ajax  

session_start();
//include_once("../modelo/modelo_armado.php");

$datos = $_POST; 
$cadena = "";
$cadena2 = "";

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
(isset($row["neumatico"])?$cadena .=$row["neumatico"]:"");
(isset($row["llanta"])?$cadena .=",".$row["llanta"]:"");
(isset($row["frenoTra"])?$cadena .=",".$row["frenoTra"]:"");
(isset($row["marco"])?$cadena .=",".$row["marco"]:"");
(isset($row["pinon"])?$cadena .=",".$row["pinon"]:"");
(isset($row["cambioTra"])?$cadena .=",".$row["cambioTra"]:"");
(isset($row["horquilla"])?$cadena .=",".$row["horquilla"]:"");
(isset($row["sillin"])?$cadena .=",".$row["sillin"]:"");
(isset($row["tija"])?$cadena .=",".$row["tija"]:"");	
(isset($row["biela"])?$cadena .=",".$row["biela"]:"");
(isset($row["platos"])?$cadena .=",".$row["platos"]:"");
(isset($row["cadena"])?$cadena .=",".$row["cadena"]:"");
(isset($row["pedal"])?$cadena .=",".$row["pedal"]:"");
(isset($row["grips"])?$cadena .=",".$row["grips"]:"");
(isset($row["manillar"])?$cadena .=",".$row["manillar"]:"");
(isset($row["frenosDel"])?$cadena .=",".$row["frenosDel"]:"");
(isset($row["mandoCambioTra"])?$cadena .=",".$row["mandoCambioTra"]:"");
(isset($row["accesorios"])?$cadena .=",".$row["accesorios"]:"");
}

foreach ($_SESSION["bicicleta"] as $ro) {

(isset($ro["neumatico"])?$cadena2 .= $ro["neumatico"]:"");
(isset($ro["llanta"])?$cadena2 .=",".$ro["llanta"]:"");
(isset($ro["pedal"])?$cadena2 .=",".$ro["pedal"]:"");

}

print(trim($cadena,',')."-".trim($cadena2,','));

?>

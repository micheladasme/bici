<?php
//query: select * from productos where pro_cod IN (17,9,2) 

session_start();
include_once("../modelo/funciones.php");

$datos = $_POST;

if ($datos["cade1"]!="") {
	$cadena1 = $datos["cade1"];
}

if ($datos["cade2"]!="") {
	$cadena2 = $datos["cade2"];
} 
$img = $datos["img"];
$peso = $datos["pesob"];
$precio = $datos["preciob"];
$id_usuario = $_SESSION['id_usuario'];
$desc = "Mi Bicicleta";



$file = md5(uniqid()) . '.png'; 
//Get the base-64 string from data
$uri=str_replace('data:image/png;base64,',' ',$img);
//Decode the string
$unencodedData=base64_decode($uri);
//Save the image
file_put_contents('../images/'.$file, $unencodedData);

if(isset($cadena1)){
$pro1 = muestraProductosArmado($cadena1);	
}else{
$pro1 = "";	
}
if(isset($cadena2)){
$pro2 = muestraProductosArmado($cadena2);	
}
else{
$pro2 = "";	
}
$id_pedido = insertaArmado($precio,$peso,$file,$desc,$id_usuario); 
$res2 = insertaDetalleArmado($pro1, $pro2, $id_pedido);

if($res2 == 1){
 echo("Bicicleta Creada Exitosamente"); 
}else{
 echo("Error al Crear Bicicleta, Intente Nuevamente");   
}

?>

<?php

//query: select * from productos where pro_cod IN (17,9,2)

// insertar id (con otros datos correspondientes) a tabla temporal de pedidos
// y luego consultar tabla temporal combianada con productos, enviar respuesta a ajax  

session_start();
include_once("../modelo/funciones.php");

$datos = $_POST; 

$cadena = $datos["productos"];


$res = muestraProductosArmado($cadena);

print("<table class='table'>
        <thead>
        <tr>
            <th>
                Código
            </th>
            <th>
                Nombre
            </th>
            <th>
                Precio Compra
            </th>
            <th>
                Precio Venta
            </th>
        </tr>
        </thead>
        <tbody>");

foreach ($res as $f) {
	  
	  print_r(
             "<tr>
             
            <td>" . $f['pro_cod'] . "</td>
            <td>" . $f['pro_nombre'] . "</td>
            <td>$" . $f['pro_precio_compra'] . "</td>
            <td>$" . $f['pro_precio_venta'] . "</td>
            </tr>"
                );
}

print("</tbody> </table>");


?>

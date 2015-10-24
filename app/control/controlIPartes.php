<?php

//query: select * from productos where pro_cod IN (17,9,2)

// insertar id (con otros datos correspondientes) a tabla temporal de pedidos
// y luego consultar tabla temporal combianada con productos, enviar respuesta a ajax  

session_start();
include_once("../modelo/funciones.php");

$datos = $_POST; 

$cadenaCom = $datos["productos"];
$cadena = explode("-", $cadenaCom);



$res = muestraProductosArmado($cadena[0]);
$res2 = muestraProductosArmado($cadena[1]);


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
                Peso
            </th>
            <th>
                Valor
            </th>
        </tr>
        </thead>
        <tbody>");
foreach ($res2 as $f) {
     print_r(
             
             "<tr>
            <td>" . $f['pro_cod'] . "</td>
            <td>" . $f['pro_nombre'] . "</td>
            <td>" . $f['pro_peso'] . " gr</td>
            <td>$" . $f['pro_precio_venta'] . "</td> </tr>"
             );
}

foreach ($res as $k) {
	  
	  print_r(
             
             
            "<tr> <td>" . $k['pro_cod'] . "</td>
            <td>" . $k['pro_nombre'] . "</td>
            <td>" . $k['pro_peso'] . " gr</td>
            <td>$" . $k['pro_precio_venta'] . "</td>
            </tr>"  );
}

print("</tbody> </table>");

$precio = 0;
$peso = 0;
foreach ($res2 as $key => $val2) {
    $precio+=$val2['pro_precio_venta'];
    $peso+=$val2['pro_peso'];
}
foreach ($res as $key => $val) {
    $precio+=$val['pro_precio_venta'];
    $peso+=$val['pro_peso'];
}

$total=($precio+($precio*0.15));

 print_r('<input type="hidden" id="pes" value="'.$peso.'"/>
    <input type="hidden" id="pre" value="'.$total.'"/>');

?>

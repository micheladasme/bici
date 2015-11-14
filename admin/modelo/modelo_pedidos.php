<?php
//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

function muestraPedidos()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT ped.ped_id,ped.ped_fecha,ped.ped_subtotal,ped.ped_peso,ped.ped_total,ped.ped_imagen,est.est_id,est.est_nombre,usu.usu_nombre FROM pedido ped 
    			INNER JOIN usuarios usu ON ped.suc_id = usu.usu_id 
    			INNER JOIN estado_armado est ON ped.est_id = est.est_id WHERE ped.est_id IN (2,3,4,5)";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraDetallePedidos($id_bici)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT det.ped_id, det.pro_cod, pro.pro_nombre, pro.pro_precio_venta, pro.pro_peso FROM detalle_pedido det INNER JOIN productos pro ON pro.pro_cod = det.pro_cod 
    INNER JOIN pedido ped ON ped.ped_id = det.ped_id WHERE det.ped_id = $id_bici";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;
}

function muestraClientePedido($id_bici)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT ped.ped_id, cli.cli_id,cli.cli_rut,cli.cli_nombre,cli.cli_apellido,cli.cli_direccion,cli.cli_telefono,cli.cli_correo,com.comu_id,com.comu_nombre FROM pedido ped INNER JOIN cliente cli ON ped.cli_id = cli.cli_id INNER JOIN comuna com ON cli.comu_id = com.comu_id WHERE ped.ped_id = $id_bici";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;
}

function anulaPedido($id_ped)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "UPDATE pedido SET est_id = 0 WHERE ped_id = $id_ped";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);


}

function updateEstado($id_bici,$est){

  $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "UPDATE pedido SET est_id = $est WHERE ped_id = $id_bici";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
   if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);

}

function siguenteEstado($id){

    $link = conectar();
    $a=array();

    $x=0;
    $sql2 = "SELECT est.est_id,est.est_nombre FROM estado_armado est WHERE est_id > $id ORDER BY est_id ASC LIMIT 1";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

?>
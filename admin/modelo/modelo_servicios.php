<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}


function registraServicio($id_cliente, $documento, $total, $fecha_ing, $fecha_ent)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO servicio (ser_documento, ser_fecha_ingreso, ser_fecha_entrega , cli_id , ser_total) VALUES ('$documento', '$fecha_ing', '$fecha_ent', '$id_cliente','$total')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}


?>
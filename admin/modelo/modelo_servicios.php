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
    $sql="INSERT INTO servicio (ser_documento, ser_fecha_ingreso, ser_fecha_entrega , cli_id , ser_total, est_ser_id) VALUES ('$documento', '$fecha_ing', '$fecha_ent', '$id_cliente','$total', 1)";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}

function muestraServicios($start,$reg)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT ser.ser_id, ser.ser_fecha_entrega, ser.ser_total,ser.ser_documento, ses.est_ser_id, ses.est_ser_nombre, cli.cli_id,cli.cli_rut , cli.cli_nombre, cli.cli_apellido FROM servicio ser, cliente cli, estado_servicio ses WHERE ser.cli_id = cli.cli_id AND ser.est_ser_id = ses.est_ser_id ORDER BY ser.ser_id ASC
            LIMIT " . $start . "," . $reg);
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function cuentaServicios()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM servicio";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}


?>
<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}


function registraUsuario($nombre, $apellido, $nick, $pass, $tipo, $suc)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO usuarios (usu_nick, usu_clave, usu_nombre , usu_apellido , tip_id, suc_id) VALUES ('$nick', '$pass', '$nombre', '$apellido','$tipo', '$suc')";
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
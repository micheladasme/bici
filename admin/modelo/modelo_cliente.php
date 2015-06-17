<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

function cuentaCliente()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM cliente" ;
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

function muestraCliente($start,$reg)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM cliente ORDER BY cli_rut ASC
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

function buscaClienterut($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM cliente WHERE cli_rut = '$codigo'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function registraCliente($rut,$nombre, $apellido,$direccion,$telefono,$correo,$nick, $pass, $tipo, $comuna)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO cliente (cli_rut,cli_nombre,cli_apellido,cli_direccion,cli_telefono,cli_correo,cli_nick,cli_pass,com_id) VALUES ('$rut','$nombre', '$apellido','$direccion','$telefono','$correo','$nick', '$pass', '$tipo', '$comuna')";
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
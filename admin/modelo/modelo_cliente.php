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

function muestraCliente()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM cliente ORDER BY cli_rut ASC");
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

function cryptPass($password, $rounds=9){
    $salt="";
    $saltChars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    
    for($i=0; $i < 22; $i++){
        $salt.= $saltChars[array_rand($saltChars)];
    }
    return crypt($password, sprintf('$2y$%02d$', $rounds). $salt);
    

}

function registraCliente($rut,$nombre, $apellido,$direccion,$telefono,$correo,$nick, $pass, $tipo, $comuna)
{
    $x=0;
    $link=conectar();
     $cryptpass = cryptPass($pass);
    $sql="INSERT INTO cliente (cli_rut,cli_nombre,cli_apellido,cli_direccion,cli_telefono,cli_correo,cli_nick,cli_pass,com_id) VALUES ('$rut','$nombre', '$apellido','$direccion','$telefono','$correo','$nick', '$cryptpass', '$tipo', '$comuna')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}

function buscarClientenom($nombre)
{
    $link=conectar();
    $a=array();
    $sql=("SELECT * FROM cliente WHERE cli_nombre LIKE '%$nombre%'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[]=array("value"=>$f['cli_nombre'].' '.$f['cli_apellido'],"id_cliente"=>$f['cli_id'],
                    "correo"=>$f['cli_correo'], "telefono"=>$f['cli_telefono'] , "direccion"=>$f['cli_direccion']);
    }
    mysql_close($link);
    return $a;

}

function modificaCliente($id,$nombre, $apellido,$direccion,$telefono,$correo,$pass,$comuna)
{
    $link=conectar();
     $cryptpass = cryptPass($pass);
    $sql="UPDATE cliente SET cli_nombre = '$nombre', cli_apellido = '$apellido', cli_direccion = '$direccion', cli_telefono = $telefono, cli_correo = '$correo',cli_pass = '$cryptpass', comu_id = $comuna WHERE cli_id = $id";

    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert

    if(mysql_affected_rows()>0)
    {
        return 1;
    }
    mysql_close($link);
}
?>
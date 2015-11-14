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
    $cryptpass = cryptPass($pass);
    $sql="INSERT INTO usuarios (usu_nick, usu_clave, usu_nombre , usu_apellido, usu_anulado , tip_id, suc_id) VALUES ('$nick', '$cryptpass', '$nombre', '$apellido', 0 ,'$tipo', '$suc')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}


function cryptPass($password, $rounds=9){
    $salt="";
    $saltChars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    
    for($i=0; $i < 22; $i++){
        $salt.= $saltChars[array_rand($saltChars)];
    }
    return crypt($password, sprintf('$2y$%02d$', $rounds). $salt);
    

}

function muestraUsuarios()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM usuarios usu
    INNER JOIN tipo_usuarios tip ON usu.tip_id = tip.tip_id WHERE usu.usu_anulado = 0     ORDER BY usu.usu_nombre ASC");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function eliminaUsuario($codigo)
{
    $link=conectar();
    $sql="UPDATE usuarios SET usu_anulado = 1 WHERE usu_id ='$codigo'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}


/*
// OTRO TIPO DE ENCRIPTACION DE PASSWORD
function cryptPass($input, $rounds = 9) {
    $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
    return crypt($input, sprintf('$2x$%02d$', $rounds) . $salt);
}

//you can verify with
$isMatch = password_verify($password, $saltedPassword);

*/

?>
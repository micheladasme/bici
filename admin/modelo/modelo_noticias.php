<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

//Función para Registrar Producto.
function registraNoticias($titulo, $subtitulo, $contenido, $rutaDestino, $usu_id)
{
    $x=0;
    $link=conectar();
    $fecha=date('Y-m-d');
    $sql="INSERT INTO noticias (not_titulo, not_subtitulo, not_contenido, not_imagen , not_fecha , usu_id) VALUES ('$titulo', '$subtitulo', '$contenido', '$rutaDestino','$fecha', '$usu_id')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
// Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}

function cuentaNoticias()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM noticias";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

function muestraNoticias()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT noti.not_id, noti.not_titulo, noti.not_subtitulo, noti.not_contenido, noti.not_imagen, noti.not_fecha,usu.usu_id, usu.usu_nombre, usu.usu_apellido FROM noticias noti,usuarios usu WHERE noti.usu_id = usu.usu_id
            ORDER BY noti.not_fecha ASC");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function muestraNoticiasid($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT not_id, not_titulo, not_subtitulo, not_contenido FROM noticias WHERE not_id = $codigo");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function muestraNoticiasTit($titulo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM Noticias WHERE not_titulo LIKE '%$titulo%'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

// Función Eliminar Producto.
function eliminaNoticia($codigo)
{
    $link=conectar();
    $sql="DELETE FROM noticias WHERE not_id ='$codigo'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

// Función Modificar Producto.
function modificaNoticias($codigo, $titulo, $subtitulo, $contenido)
{
    $link=conectar();
    $sql="UPDATE noticias SET not_titulo = '$titulo', not_subtitulo = '$subtitulo', not_contenido = '$contenido' WHERE not_id = '$codigo'  ";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

?>

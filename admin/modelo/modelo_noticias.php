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


?>
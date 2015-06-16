<?php
//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

function muestraCategorias($start,$reg)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM categorias ORDER BY cat_nombre ASC
			LIMIT " . $start . "," . $reg);
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function cuentaCategoria()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM categorias" ;
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

function modificaCategoria($id, $nombre, $descripcion)
{
    $link=conectar();
    $sql="UPDATE catgorias SET cat_nombre = '$nombre', cat_descripcion = '$descripcion' WHERE cat_id = '$id'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

function muestraCategoriaCod($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM categorias WHERE cat_id = '$codigo'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function buscaCategoriasnom($codigo)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 ="SELECT * FROM categorias WHERE cat_nombre like '%$codigo%'";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_array($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;
}

function registraCategoria($nombre,$descripcion)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO categorias (cat_nombre,cat_descripcion) VALUES ('$nombre','$descripcion')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}



function muestraSubCategorias($start,$reg)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sub.subcat_id,sub.subcat_nombre,cat.cat_nombre FROM subcategoria sub, categorias cat WHERE sub.subcat_id = cat.cat_id ORDER BY subcat_id ASC
			LIMIT " . $start . "," . $reg);
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function cuentaSubCategoria()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM subcategoria" ;
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

function modificaSubCategoria($id, $nombre, $cat_id)
{
    $link=conectar();
    $sql="UPDATE subcatgoria SET subcat_nombre = '$nombre', cat_id = '$cat_id' WHERE subcat_id = '$id'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

function muestraSubCategoriaCod($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM subcategoria WHERE subcat_id = '$codigo'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function buscaSubCategoriasnom($codigo)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 ="SELECT sub.subcat_id,sub.subcat_nombre,cat.cat_nombre FROM subcategoria sub, categorias cat WHERE sub.subcat_id = cat.cat_id AND sub.subcat_nombre like '%$codigo%'";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_array($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;
}

function registraSubCategorias($nombre, $cat_id)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO subcategoria (subcat_nombre,cat_id) VALUES ('$nombre','$cat_id')";
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
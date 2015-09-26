<?php

function conectar()
	{
		$link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion."); 
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}

function muestraLlantas()
{
	$link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 1";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraNeumaticos()
{
	$link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 2";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraFrenos()
{
	$link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 3";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraPinones()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 4";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraCambioTrasero()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 5";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraTija()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 5";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function insertaTemporal()
{
    $x=0;
        $link=conectar();
        $sql="INSERT INTO ";
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
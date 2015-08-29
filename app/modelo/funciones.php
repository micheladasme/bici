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
?>
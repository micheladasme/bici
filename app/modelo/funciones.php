<?php

function conectar()
	{
		$link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion."); 
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}

function muestraProductosArmado($cadena)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE pro_cod IN ($cadena)";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {

        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


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



function muestraPinones()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 3 OR subcat_id = 4";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraMarcos()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 18";
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
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 6";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraHorquilla()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 8";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraSillin()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 9";
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
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 10";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraBiela()
{
   
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 20";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;
 
}

function muestraPlatos()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 11";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraCadenas()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 12";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraGuias()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 6";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}


function muestraPedal()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 13";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraManillar()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 15";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraGrips()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 16";
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
    $sql2 = "SELECT * FROM productos WHERE subcat_id IN (17,18)";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function muestraMandos()
{
    
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 7";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function insertaBicicleta($subtotal,$total,$mano_obra,$imagen,$id_detalle,$cli_id,$usu_id,$id_modo,$est_id,$suc_id)
{
    $x=0;
        $link=conectar();
        $sql="INSERT INTO pedido (ped_subtotal, ped_total, ped_fecha, ped_mano_obra, ped_imagen, ped_detalle, cli_id, usu_id, id_modo, est_id, suc_id) VALUES 
        ($subtotal,$total,$mano_obra,$imagen,$id_detalle,$cli_id,$usu_id,$id_modo,$est_id,$suc_id)";
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
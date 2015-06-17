<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}


//Funcion Ingresa Gastos
function IngresaGastos($monto, $descripcion, $tipo)
{

    $x=0;
    $link=conectar();
    $sql="INSERT INTO gastos (gas_fecha, gas_monto, gas_descripcion, tg_id) VALUES ( (SELECT CURDATE()), '$monto', '$descripcion', '$tipo')";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}


//Funcion muestra Gastos
function muestraGastos_Venta($fecha)
{
    $link=conectar();
    $a=array();
    $x=0;

    $sql=("SELECT sum(caja_final) from caja where caja_fecha= '$fecha'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gastos Rango
function muestraGastos_Venta2($fecha1,$fecha2)
{
    $link=conectar();
    $a=array();
    $x=0;

    $sql=("SELECT sum(caja_final) from caja where caja_fecha BETWEEN '$fecha1' AND '$fecha2'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Local
function muestraGastos_Local($fecha)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto)  from gastos where tg_id = 1  and gas_fecha = '$fecha'");

    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Local por rango
function muestraGastos_Local2($fecha1,$fecha2)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto)  from gastos where tg_id = 1 and gas_fecha BETWEEN '$fecha1' and '$fecha2'");

    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Merma
function muestraGastos_Merma($fecha)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto) from gastos where tg_id = 2 and gas_fecha = '$fecha'");

    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Merma por rango
function muestraGastos_Merma2($fecha1,$fecha2)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto) from gastos where tg_id = 2 and gas_fecha BETWEEN '$fecha1' and '$fecha2'");

    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Mercaderia
function muestraGastos_Mercaderia($fecha)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto) from gastos where tg_id = 3 and gas_fecha = '$fecha'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

//Funcion muestra Gasto Mercaderia por rango
function muestraGastos_Mercaderia2($fecha1,$fecha2)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT sum(gas_monto) from gastos where tg_id = 3 and gas_fecha BETWEEN '$fecha1' and '$fecha2'");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());


    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function muestraGasto($start,$reg)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT gas_fecha, tg_descripcion ,gas_monto,gas_descripcion FROM gastos g, tipo_gastos tg
			WHERE g.tg_id = tg.tg_id
			ORDER BY gas_fecha DESC
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

function cuentaGasto()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM gastos";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

function muestraGastofecha($fecha)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT gas_id, gas_fecha, tg_descripcion ,gas_monto,gas_descripcion FROM gastos g, tipo_gastos tg
			WHERE g.tg_id = tg.tg_id
			AND gas_fecha= $fecha");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function eliminaGasto($codigo)
{
    $link=conectar();
    $sql="DELETE FROM gastos WHERE gas_id ='$codigo'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}


?>
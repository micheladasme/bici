<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

// Función Muestra Stock con paginacion.
function muestraStock($start,$reg)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
ORDER BY pro_nombre ASC
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
function muestraStocknom($nombre)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pr.pro_nombre like '%$nombre%' ");
$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
while($f=mysql_fetch_array($res))
{
$a[$x]=$f;
$x++;
}
mysql_close($link);
return $a;
}

function muestraStockTiendanom($nombre)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pu.ubc_id = 1
AND pr.pro_nombre like '%$nombre%' ");
$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
while($f=mysql_fetch_array($res))
{
$a[$x]=$f;
$x++;
}
mysql_close($link);
return $a;
}

function muestraStockBodeganom($nombre)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pu.ubc_id = 2
AND pr.pro_nombre like '%$nombre%' ");
$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
while($f=mysql_fetch_array($res))
{
$a[$x]=$f;
$x++;
}
mysql_close($link);
return $a;
}

function muestraStockFalta()
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pu.pu_cantidad <= 2
ORDER BY pro_nombre ASC");

$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
while($f=mysql_fetch_array($res))
{
$a[$x]=$f;
$x++;
}
mysql_close($link);
return $a;
}

// Función Muestra Productos con paginacion en Tienda.
function muestraStockTienda($start,$reg)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pu.pu_id, pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pu.ubc_id = 1
ORDER BY pro_nombre ASC
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

function cuentaStockTienda()
{
$link = conectar();
$x=0;
$sql ="SELECT * FROM producto_ubicacion WHERE ubc_id = 1";
$res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
$x= mysql_num_rows($res);
mysql_close($link);
return $x;
}

// Función Muestra Productos con paginacion en Tienda.
function muestraStockBodega($start,$reg)
{
$link=conectar();
$a=array();
$x=0;
$sql=("SELECT pu.pu_id, pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
FROM producto_ubicacion pu, productos pr, ubicacion ubc
WHERE pr.pro_id = pu.pro_id
AND pu.ubc_id = ubc.ubc_id
AND pu.ubc_id = 2
ORDER BY pro_nombre ASC
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

function cuentaStockBodega()
{
$link = conectar();
$x=0;
$sql ="SELECT * FROM producto_ubicacion WHERE ubc_id = 2 AND suc_id = 1";
$res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
$x= mysql_num_rows($res);
mysql_close($link);
return $x;
}


//Función para Registrar Stock.
function registraStock($codigo, $ubicacion, $cantidad)
{
    $x=0;
    $link=conectar();
    $sql="INSERT INTO producto_ubicacion (pro_cod, ubc_id, pu_cantidad,suc_id) VALUES ('$codigo', $ubicacion, $cantidad, 1)";
    $res=mysql_query($sql,$link)or die("Error en: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}

// Funcion para Modificar Stock
function modificaStock($codigo, $ubicacion, $cantidad)
{
    $link=conectar();
    $sql="UPDATE producto_ubicacion SET pu_cantidad = pu_cantidad + $cantidad WHERE pro_cod = '$codigo' AND ubc_id = '$ubicacion' ";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

function sumaStockTienda($cod, $cantidad)
{
    $link=conectar();
    $sql="UPDATE producto_ubicacion SET pu_cantidad = pu_cantidad + $cantidad WHERE pro_cod = $cod AND ubc_id = 1 AND suc_id = 1 ";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}
function restaStockBodega($cod, $cantidad)
{
    $link=conectar();
    $sql="UPDATE producto_ubicacion SET pu_cantidad = pu_cantidad - $cantidad WHERE pro_cod = '$cod' AND ubc_id = 2 ";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

//funcion para Eliminar Stock
function eliminaStock($codigo)
{
    $link=conectar();
    $sql="DELETE FROM producto_ubicacion WHERE pu_id ='$codigo'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

// Función Ver si existe Stock
function existeStock($codigo , $ubicacion)
{
    $link = conectar();
    $sql = "SELECT * FROM producto_ubicacion WHERE pro_cod = '$codigo' AND ubc_id = '$ubicacion'";
    $resultado = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    mysql_close($link);
    if(mysql_num_rows($resultado) > 0)
    {
        return '1';
    }

}
// Función Ver si existe Stock
function existeStockBodega($codigo)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql = "SELECT pu.pu_id, pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pu.pu_cantidad, ubc.ubc_descripcion
			   FROM producto_ubicacion pu, productos pr, ubicacion ubc
			   WHERE pr.pro_id = pu.pro_id
			   AND pu.ubc_id = ubc.ubc_id
			   AND pu.ubc_id = 2
			   AND pu.pro_cod = $codigo";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;


}
function existeStock2($codigo , $ubicacion)
{
    $link = conectar();
    $sql = "SELECT * FROM producto_ubicacion WHERE pro_cod = '$codigo' AND ubc_id = '$ubicacion'";
    $resultado = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    mysql_close($link);
    if(mysql_num_rows($resultado) > 0)
    {
        return '1';
    }

}
function cuentaStock()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM producto_ubicacion";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}


?>
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
function registraProducto($codigo, $nombre, $compra, $venta, $rutaDestino, $peso, $descripcion ,$categoria)
{
$x=0;
$link=conectar();
$sql="INSERT INTO productos (pro_cod, pro_nombre, pro_precio_compra, pro_precio_venta , pro_imagen , pro_peso, pro_descripcion, pro_estado , subcat_id) VALUES ('$codigo', '$nombre', '$compra', '$venta','$rutaDestino', '$peso','$descripcion', 1 ,'$categoria')";
$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
// Verificamos si se realizo el insert
if(mysql_affected_rows()>0)
{
$x=1;
}
return $x;
mysql_close($link);
}

// Función Ver si existe Producto
function existeProducto($codigo)
{
$link = conectar();
$sql = "SELECT * FROM productos WHERE pro_cod = '$codigo'";
$resultado = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
if(mysql_num_rows($resultado) > 0)
{
return '1';
}
mysql_close($link);
}

function buscaProducto($codigo){

    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM productos WHERE pro_cod = '$codigo' AND pro_estado = 1";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function buscaProductoDetalle($codigo){

    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pr.pro_imagen, pr.pro_peso,pr.pro_color,pr.pro_talla, subsubcat.cat_nombre
        FROM productos pr,subcategoria subcat
        WHERE pr.pro_cod = $codigo
        AND pr.subcat_id = subcat.subcat_id";
    $res2= mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

// Función Muestra Productos
function muestraProductos()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT pro.pro_cod, pro.pro_nombre, pro.pro_precio_compra, pro.pro_precio_venta, subsubcat.cat_nombre FROM productos pro, subcategoria subcat WHERE pro.subcat_id = subcat.subcat_id AND pro_estado = 1 ORDER BY pro_nombre ASC");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function cuentaProductos()
{
    $link = conectar();
    $x=0;
    $sql ="SELECT * FROM productos WHERE pro_estado = 1";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $x= mysql_num_rows($res);
    mysql_close($link);
    return $x;
}

// Funcion Muestra Productos por Código.
function muestraProductosCod($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM productos WHERE pro_cod = '$codigo' AND pro_estado = 1");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function muestraProductosNom($nombre)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT * FROM productos WHERE pro_nombre LIKE '%$nombre%' AND pro_estado = 1");
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
function eliminaProducto($codigo)
{
    $link=conectar();
    $sql="DELETE FROM productos WHERE pro_cod ='$codigo'";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

// Función Modificar Producto.
function modificaProducto($codigo, $nombre, $compra, $venta)
{
    $link=conectar();
    $sql="UPDATE productos SET pro_nombre = '$nombre', pro_precio_compra = '$compra', pro_precio_venta = '$venta' WHERE pro_cod = '$codigo'  ";
    $res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}

?>

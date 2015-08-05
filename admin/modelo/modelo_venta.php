<?php

//Función para Conectarse a la BD.
function conectar()
{
    $link = mysql_connect('localhost', 'root'/*'maskotin_admin'*/, ''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles', $link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}

function registraDineroInicial($din_ini, $usuario)
{
    $x = 0;
    $link = conectar();
    // mostrar fecha tal cual es
    //$fecha1=explode('-', $fecha);
    //echo "el Dia es :".$fecha1[2].$fecha1[1].$fecha1[0];
    $sql = "INSERT INTO caja(caja_fecha,caja_hora_inicio,caja_inicial,caja_final,usu_id) VALUES ((SELECT CURDATE()),(SELECT CURTIME()),'$din_ini','$din_ini','$usuario')";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    //echo $sql ;
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);
}

// ingresa Venta Realizada en Compra
function ingresaEnc($modo, $total, $id_vend)
{
    $x = 0;
    $link = conectar();
    $sql = "INSERT INTO compra (com_total, com_fecha,com_nula,id_modo, usu_id) VALUES ($total,(SELECT CURDATE()),0, $modo, $id_vend)";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);
}

// Retorna el ultimo numero de compra
function retornaidenc()
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT max(com_id)FROM compra;");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

// Retorna productos por vendedor
function retornaproc($id)
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT * FROM venta where v_vendedor = $id;");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

// Ingresa Producto en Boleta
function ingresaprocbol($codigo, $en, $subtotal, $cant)
{
    $x = 0;
    $link = conectar();
    $sql = "INSERT INTO detalle_compra (det_cantidad, det_subtotal, com_id, pro_cod) VALUES ($cant,$subtotal,$en,'$codigo')";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);
}

function eliminaVenta($id_vend)
{
    $x = 0;
    $link = conectar();
    $sql = "delete from venta where v_vendedor = $id_vend ";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);
}

function actualizacaja($total, $id_vend)
{
    $link = conectar();
    $sql = "UPDATE Caja SET caja_final = caja_final + $total WHERE caja_fecha = (SELECT CURDATE()) AND usu_id = '$id_vend' ";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        return '1';
    }
    mysql_close($link);


}

function restaStock($codigo, $cantidad)
{
    $link = conectar();
    $sql = "UPDATE producto_ubicacion SET pu_cantidad = pu_cantidad - $cantidad WHERE pro_cod = '$codigo' AND ubc_id = 1 ";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        return '1';
    }
    mysql_close($link);
}

function consultaVenta($id)
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT * FROM venta WHERE v_vendedor = '$id'");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function detalleVenta($id)
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT c.com_id, u.usu_nombre, u.usu_apellido,c.com_fecha, c.com_total, mp.tipo_modo
			FROM compra c, usuarios u, modo_pago mp
			WHERE u.usu_id = c.usu_id
			AND mp.id_modo = c.id_modo
			AND c.com_id = $id");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a = $f;
       
    }
    mysql_close($link);
    return $a;


}

function detalleVenta2($id)
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT b.pro_cod, p.pro_nombre, b.det_cantidad, b.det_subtotal
				FROM productos p, detalle_compra b, compra c
				WHERE c.com_id = b.com_id
				AND p.pro_cod = b.pro_cod
				AND b.com_id = $id");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;


}

function eliminarventa($id)
{

    $link = conectar();
    $sql = "DELETE FROM venta WHERE v_id ='$id' ";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    if (mysql_affected_rows() > 0) {
        return 'Se ha Eliminado el Producto de la Boleta';
    }
    mysql_close($link);
}

function consultaVendedor($id_vend)
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = "SELECT max(caja_id) FROM caja WHERE usu_id = $id_vend";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($row = mysql_fetch_assoc($res)) {
        $ultimo = $row["max(caja_id)"];
    }
    return $ultimo;
}


function cierraCaja($id_vend, $ultimo)
{
    $link = conectar();
    $sql = "UPDATE caja SET caja_hora_termino = (SELECT CURTIME()) WHERE caja_fecha = (SELECT CURDATE()) AND usu_id = '$id_vend' AND caja_id = $ultimo";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        return '1';
    }
    mysql_close($link);


}

function anulaVenta($id)
{
    $link = conectar();
    $sql = "UPDATE compra SET com_nula = 1 WHERE com_id = '$id' ";
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        return '1';
    }
    mysql_close($link);


}

function devuelvemodo()
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT * from modo_pago;");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function consultasubtotal()
{
    $link = conectar();
    $a = array();
    $x = 0;
    $sql = ("SELECT SUM( v_subtotal )FROM venta;");
    $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while ($f = mysql_fetch_assoc($res)) {
        $a[$x] = $f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function buscaProducto($codigo)
{

    $link = conectar();
    $a = array();
    $x = 0;
    $sql2 = "SELECT * FROM productos WHERE pro_cod = '$codigo' AND pro_estado = 1";
    $res2 = mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while ($f = mysql_fetch_assoc($res2)) {
        $a[$x] = $f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function buscaProductoDetalle($codigo)
{

    $link = conectar();
    $a = array();
    $x = 0;
    $sql2 = "SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pr.pro_imagen, pr.pro_peso, cat.cat_nombre
        FROM productos pr,categorias cat
        WHERE pr.pro_cod = $codigo
        AND pr.cat_id = cat.cat_id";
    $res2 = mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while ($f = mysql_fetch_assoc($res2)) {
        $a[$x] = $f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function existeStock2($codigo, $ubicacion)
{
    $link = conectar();
    $sql = "SELECT * FROM producto_ubicacion WHERE pro_cod = '$codigo' AND ubc_id = '$ubicacion'";
    $resultado = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    $a = mysql_fetch_assoc($resultado);
    mysql_close($link);
    return $a;
}

function registraVentaProducto($cod,$nom,$cant,$val,$subt,$vende)
{

    $x=0;
    $link=conectar();
    $sql="INSERT INTO venta (v_codigo,v_nombre,v_cantidad,v_valor,v_subtotal,v_vendedor) VALUES ('$cod', '$nom', $cant, $val, $subt,$vende)";
    $res=mysql_query($sql,$link) or die("Error en: " . mysql_error());
    // Verificamos si se realizo el insert
    if(mysql_affected_rows()>0)
    {
        $x=1;
    }
    return $x;
    mysql_close($link);
}

function muestraVenta()
    {
        $link=conectar();
        $a=array();
        $x=0;
        $sql=("SELECT c.com_id, c.com_total, c.com_fecha, mp.tipo_modo, u.usu_nombre, mp.tipo_modo 
             FROM compra c,usuarios u, modo_pago mp where u.usu_id = c.usu_id and mp.id_modo = c.id_modo 
             AND com_nula = 0
             ORDER BY c.com_fecha DESC");
        $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
        while($f=mysql_fetch_array($res))
        {
            $a[$x]=$f;
            $x++;
        }
        mysql_close($link);
        return $a;
    }

    function cuentaVenta()
    {
        $link = conectar();
        $x=0;
        $sql ="SELECT * FROM compra WHERE com_nula = 0";
        $res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
        $x= mysql_num_rows($res);
        mysql_close($link);
        return $x;
     }

    
 

?>

<?php
//Función para Conectarse a la BD.
function conectar()
{
    $link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion.");
    mysql_select_db('sccycles',$link) or die("Error en la BD");
    mysql_query("SET NAMES 'utf8'");
    return $link;
}


function ingresosActividades()
{
	$link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT fecha_venta, total_servicios , total_ventas, total_pedido FROM (select Date_format( com_fecha ,'%Y-%m') as fecha_venta, SUM(com_total) as total_ventas, com_nula FROM compra GROUP BY fecha_venta) T1 LEFT JOIN (select Date_format(ser_fecha_entrega ,'%Y-%m') as fecha_servicio, SUM(ser_total) as total_servicios FROM servicio GROUP BY fecha_servicio) T2 ON T2.fecha_servicio =T1.fecha_venta LEFT JOIN (select Date_format(ped_fecha,'%Y-%m') as fecha_pedido, SUM(ped_total) as total_pedido FROM pedido GROUP BY fecha_pedido) T3 ON T3.fecha_pedido = T1.fecha_venta WHERE T1.com_nula = 0";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

}

function cantidadActividades()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT (SELECT COUNT(*) FROM compra WHERE com_nula = 0) as total_ventas, (SELECT COUNT(*) FROM servicio) as total_servicios, (SELECT COUNT(*) FROM pedido) as total_armados";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a=$f;
        
    }
    mysql_close($link);
    return $a;

}

function fechaActividades()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT anio_venta FROM (select Date_format(com_fecha ,'%Y') as anio_venta, com_nula FROM compra GROUP BY anio_venta) T1 LEFT JOIN (select Date_format(ser_fecha_entrega ,'%Y') as anio_servicio FROM servicio GROUP BY anio_servicio) T2 ON  T2.anio_servicio =T1.anio_venta LEFT JOIN (select Date_format(ped_fecha,'%Y') as anio_pedido FROM pedido GROUP BY anio_pedido) T3 ON T3.anio_pedido =T1.anio_venta LEFT JOIN (select Date_format(gas_fecha,'%Y') as anio_gasto FROM gastos GROUP BY anio_gasto) T4 ON T4.anio_gasto =T1.anio_venta WHERE com_nula = 0");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
        
    }
    mysql_close($link);
    return $a;

         

}

function cantidadActividadesHoy()
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT fecha_venta, total_servicios , total_ventas, total_pedido FROM (select com_fecha AS fecha_venta, count(com_id) as total_ventas, com_nula FROM compra GROUP BY fecha_venta) T1 LEFT JOIN (select ser_fecha_entrega as fecha_servicio, count(ser_id) as total_servicios FROM servicio GROUP BY fecha_servicio) T2 ON T2.fecha_servicio =T1.fecha_venta LEFT JOIN (select ped_fecha as fecha_pedido, count(ped_id) as total_pedido FROM pedido GROUP BY fecha_pedido) T3 ON T3.fecha_pedido = T1.fecha_venta WHERE T1.com_nula = 0 AND T1.fecha_venta = CURDATE()";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a=$f;
        
    }
    mysql_close($link);
    return $a;

}

function cantidadActividadesfecha()
{
	$link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT fecha_venta, total_servicios , total_ventas, total_pedido FROM (select Date_format( com_fecha ,'%Y-%m')  as fecha_venta, count(com_id) as total_ventas, com_nula FROM compra GROUP BY fecha_venta) T1 LEFT JOIN (select Date_format(ser_fecha_entrega ,'%Y-%m')  as fecha_servicio, count(ser_id) as total_servicios FROM servicio GROUP BY fecha_servicio) T2 ON T2.fecha_servicio =T1.fecha_venta
			LEFT JOIN (select Date_format(ped_fecha,'%Y-%m')  as fecha_pedido, count(ped_id) as total_pedido FROM pedido GROUP BY fecha_pedido) T3 ON T3.fecha_pedido = T1.fecha_venta WHERE T1.com_nula = 0";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;

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

function productosMasVendidos()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT det.pro_cod, pro.pro_nombre, COUNT(det.pro_cod) as cantidad FROM detalle_compra det INNER JOIN productos pro ON pro.pro_cod = det.pro_cod GROUP BY pro_cod ORDER BY cantidad DESC LIMIT 10");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}

function ultimasVentas()
{
     $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT com.com_id, Date_format(com.com_fecha,'%d/%m/%Y') as com_fecha, com.com_total, mdp.tipo_modo FROM compra com, modo_pago mdp WHERE com.id_modo = mdp.id_modo ORDER BY com_id DESC LIMIT 8");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
        
    }
    mysql_close($link);
    return $a;

    
}

function muestraVentas()
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT com.com_id, Date_format(com.com_fecha,'%d/%m/%Y') as com_fecha, com.com_total, mdp.tipo_modo FROM compra com, modo_pago mdp WHERE com.id_modo = mdp.id_modo ORDER BY com_id DESC");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
        
    }
    mysql_close($link);
    return $a;

    
}

function muestraGasto()
{
     $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT gas.gas_id, Date_format(gas.gas_fecha,'%d/%m/%Y') as gas_fecha, gas.gas_monto, tpg.tg_descripcion FROM gastos gas, tipo_gastos tpg WHERE gas.tg_id = tpg.tg_id ORDER BY gas_id DESC");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
        
    }
    mysql_close($link);
    return $a;

    
}

function gananciasMes($anio)
{
    $link=conectar();
    $a=array();
    $x=0;
    $sql=("SELECT mes_venta, anio_venta ,total_servicios,total_ventas,total_pedido,total_gasto FROM 
        (select Date_format(com_fecha ,'%Y') as anio_venta, Date_format(com_fecha ,'%m') as mes_venta, SUM(com_total) as total_ventas, com_nula FROM compra GROUP BY mes_venta ,anio_venta) T1 LEFT JOIN 
        (select Date_format(ser_fecha_entrega ,'%Y') as anio_servicio, Date_format(ser_fecha_entrega ,'%m') as mes_servicio, SUM(ser_total) as total_servicios FROM servicio GROUP BY anio_servicio, mes_servicio) T2 ON T2.mes_servicio =T1.mes_venta AND T2.anio_servicio =T1.anio_venta
        LEFT JOIN 
(select Date_format(ped_fecha,'%Y') as anio_pedido, Date_format(ped_fecha,'%m') as mes_pedido, SUM(ped_total) as total_pedido FROM pedido GROUP BY mes_pedido, anio_pedido) T3 ON T3.mes_pedido =T1.mes_venta AND T3.anio_pedido =T1.anio_venta
LEFT JOIN 
(select Date_format(gas_fecha,'%Y') as anio_gasto, Date_format(gas_fecha,'%m') as mes_gasto, SUM(gas_monto) as total_gasto FROM gastos GROUP BY mes_gasto, anio_gasto) T4 ON T4.mes_gasto =T1.mes_venta AND T4.anio_gasto =T1.anio_venta WHERE anio_venta = $anio");
    $res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
    while($f=mysql_fetch_assoc($res))
    {
        $a[$x]=$f;
        $x++;
        
    }
    mysql_close($link);
    return $a;

    
}

?>
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

function insertaArmado($precio,$peso,$imagen,$desc,$cli_id)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 ="INSERT INTO pedido (ped_peso,ped_subtotal,ped_fecha,ped_imagen,ped_detalle,cli_id,usu_id,id_modo,est_id,suc_id) VALUES ($peso,$precio,(SELECT CURDATE()),'$imagen','$desc',$cli_id,1,1,1,1)";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    $a = mysql_insert_id($link);
    return $a;


} 

function pedirArmado($codigo)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 ="UPDATE pedido SET est_id = 2 WHERE ped_id = '$codigo'";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    
    if(mysql_affected_rows()>0)
    {
        return '1';
    }
    mysql_close($link);
}


function insertaDetalleArmado($pro1, $pro2, $pedido)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "INSERT INTO detalle_pedido (det_cantidad,det_subtotal,pro_cod,ped_id) VALUES "; 
    if ($pro1!="") {
       foreach ($pro1 as $key => $p1) {
       //$sql2.="(1,".$p1['pro_precio_venta'].",".$p1['pro_cod'].",$pedido),";
        $precioVenta = (int) $p1['pro_precio_venta'];
        $proCod = mysql_real_escape_string($p1['pro_cod']);
        $a[] = "('1','$precioVenta','$proCod','$pedido')";
    }
    }
    if ($pro2!="") {
       foreach ($pro2 as $key => $p2) {
       $precioVenta = (int) $p2['pro_precio_venta'];
        $proCod = mysql_real_escape_string($p2['pro_cod']);
        $a[] = "('1','$precioVenta','$proCod','$pedido')";
       //$sql2.="(1,".$p2['pro_precio_venta'].",".$p2['pro_cod'].",$pedido),";
    }
    }
   
    $sql2.= implode(',', $a);
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    // Verificamos si se realizo el insert
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);


} 

function muestraCreaciones($id_usu)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM pedido WHERE cli_id = $id_usu AND est_id = 1";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function eliminarCreaciones($id_crea)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "UPDATE pedido SET est_id = 0 WHERE ped_id = $id_crea";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    if (mysql_affected_rows() > 0) {
        $x = 1;
    }
    return $x;
    mysql_close($link);


}

function muestraDetalleCreaciones($id_bici)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT det.ped_id, det.pro_cod, pro.pro_nombre, pro.pro_precio_venta, pro.pro_peso FROM detalle_pedido det INNER JOIN productos pro ON pro.pro_cod = det.pro_cod 
    INNER JOIN pedido ped ON ped.ped_id = det.ped_id WHERE det.ped_id = $id_bici";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraPedidos($id_usu)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT * FROM pedido WHERE cli_id = $id_usu AND est_id IN (2,3,4,5)";
    $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
    while($f=mysql_fetch_assoc($res2))
    {
        $a[$x]=$f;
        $x++;

    }
    mysql_close($link);
    return $a;


}

function muestraDetallePedidos($id_bici)
{
    $link = conectar();
    $a=array();
    $x=0;
    $sql2 = "SELECT det.ped_id, det.pro_cod, pro.pro_nombre, pro.pro_precio_venta, pro.pro_peso FROM detalle_pedido det INNER JOIN productos pro ON pro.pro_cod = det.pro_cod 
    INNER JOIN pedido ped ON ped.ped_id = det.ped_id WHERE det.ped_id = $id_bici";
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
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 19 or subcat_id = 20";
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
    $sql2 = "SELECT * FROM productos WHERE subcat_id = 21";
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
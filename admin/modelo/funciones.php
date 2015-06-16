<?php

	//Función para Conectarse a la BD.
	function conectar()
	{
		$link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion."); 
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}

	function devuelvemodo()
    {
        $link=conectar();
        $a=array();
		$x=0;		
		$sql=("SELECT * from modo_pago;");
		$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());		
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
    }
    function consultasubtotal(){
        $link=conectar();
        $a=array();
		$x=0;		
		$sql=("SELECT SUM( v_subtotal )FROM venta;");
		$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());		
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
    }
	//Función para Registrar Producto.
	function registraProducto($codigo, $nombre, $compra, $venta, $rutaDestino, $peso, $descripcion ,$categoria)
	{
		$x=0;
		$link=conectar();
		$sql="INSERT INTO productos (pro_cod, pro_nombre, pro_precio_compra, pro_precio_venta , pro_imagen , pro_peso, pro_descripcion, pro_estado , cat_id) VALUES ('$codigo', '$nombre', '$compra', '$venta','$rutaDestino', '$peso','$descripcion', 1 ,'$categoria')";
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
	
	
	/*function buscaPromociones($codigo)
	{
		$link = conectar();
		$a=array();        
		$x=0;       
        $sql2 = "SELECT * FROM productos WHERE pro_cod = '$codigo' AND tp_id = 2";
        $res2=mysql_query($sql2, $link);
         	while($f=mysql_fetch_array($res2))
		{
		    $a[$x]=$f;
		    $x++;
            
		}        
		mysql_close($link);        
        return $a;     
	}
		function buscaPromocionesnom($codigo)
	{
		$link = conectar();
		$a=array();        
		$x=0;       
        $sql2 ="SELECT * FROM productos WHERE pro_nombre like '%$codigo%' AND tp_id = 2";
        $res2=mysql_query($sql2, $link);
         	while($f=mysql_fetch_array($res2))
		{
		    $a[$x]=$f;
		    $x++;
            
		}        
		mysql_close($link);        
        return $a;     
	}*/

    function buscaProducto($codigo){
        
		$link = conectar();
		$a=array();        
		$x=0;       
        $sql2 = "SELECT * FROM productos WHERE pro_cod = '$codigo' AND pro_estado = 1";
        $res2=mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
         	while($f=mysql_fetch_array($res2))
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
		$sql2 = "SELECT pr.pro_cod, pr.pro_nombre, pr.pro_precio_venta, pr.pro_precio_compra, pr.pro_imagen, pr.pro_peso, cat.cat_nombre
        FROM productos pr,categorias cat
        WHERE pr.pro_cod = $codigo 
        AND pr.cat_id = cat.cat_id";
        $res2= mysql_query($sql2, $link) or die("Error en: $sql2: " . mysql_error());
         	while($f=mysql_fetch_array($res2))
		{
		    $a[$x]=$f;
		    $x++;
            
		}        
		mysql_close($link);        
        return $a;    

    }

	// Función Muestra Productos con paginacion.
	function muestraProductos($start,$reg)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM productos WHERE pro_estado = 1 ORDER BY pro_nombre ASC  
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
		while($f=mysql_fetch_array($res))
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
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
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
	
		
		while($f=mysql_fetch_array($res))
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
	
		
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
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
		
		
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
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

	
	//funcion Ingresa promocion
		/*function registraPromocion($cod_producto, $preciov ,$precioc, $nombre)
	{
		$x=0;
		$link=conectar();
		$sql="INSERT INTO productos (pro_cod, pro_nombre,pro_precio_compra,pro_precio_venta,tp_id) VALUES ('$cod_producto','$nombre','$precioc','$preciov', 2)";
		$res=mysql_query($sql,$link);
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			$x=1;
		}
		return $x;
		mysql_close($link);
	}*/
	
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
     // Función Ver si existe Promocion
	/*function existePromocion($cod_producto)
	{
		$link = conectar();
		$sql = "SELECT * FROM productos WHERE pro_cod = '$cod_producto' AND tp_id = 2";
		$resultado = mysql_query($sql, $link);
		if(mysql_num_rows($resultado) > 0)
		{
			return '1';
		}
		mysql_close($link);
	}*/
 
    //funcion muestra promocion
	/*function muestraPromocion($start,$reg)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM productos WHERE tp_id = 2 ORDER BY pro_nombre ASC 
			LIMIT " . $start . "," . $reg);
		$res=mysql_query($sql, $link);
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
	}
     
	function cuentaPromocion()
	{
		$link = conectar();
		$x=0;
		$sql ="SELECT * FROM productos WHERE tp_id = 2";
		$res = mysql_query($sql, $link);
		$x= mysql_num_rows($res);
		mysql_close($link);
		return $x;
     }


// Funcion Muestra Promociones por Código.
	function muestraPromocionCod($codigo)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM productos WHERE pro_cod = '$codigo' AND tp_id = 2");
		$res=mysql_query($sql, $link);
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
	}

	// Función Eliminar Promocion.
	function eliminaPromocion($codigo)
	{
		$link=conectar();
		$sql="DELETE FROM productos WHERE pro_cod ='$codigo' AND tp_id = 2 ";
		$res=mysql_query($sql,$link);
		if(mysql_affected_rows()>0)
		{
			return '1';
		}
		mysql_close($link);
	}

	// Función Modificar Promocion.
	function modificaPromocion($cod_producto, $precioc ,$preciov, $nombre)
	{
		$link=conectar();
		$sql="UPDATE productos SET pro_cod = '$cod_producto', pro_precio_compra = '$precioc', pro_precio_venta = '$preciov', pro_nombre = '$nombre' WHERE pro_cod = '$cod_producto' AND tp_id = 2 ";
		$res=mysql_query($sql,$link);
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			return '1';
		}
		mysql_close($link);
	}*/

	function registraDineroInicial($din_ini,$usuario)
	{
		$x=0;
		$link=conectar();
		// mostrar fecha tal cual es
		//$fecha1=explode('-', $fecha);
		//echo "el Dia es :".$fecha1[2].$fecha1[1].$fecha1[0];
		$sql="INSERT INTO caja(caja_fecha,caja_hora_inicio,caja_inicial,caja_final,usu_id) VALUES ((SELECT CURDATE()),(SELECT CURTIME()),'$din_ini','$din_ini','$usuario')";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		//echo $sql ;
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			$x=1;
		}
		return $x;
		mysql_close($link);
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
		while($f=mysql_fetch_array($res))
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
		while($f=mysql_fetch_array($res))
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
 
 function muestraVenta($start,$reg)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT c.com_id, c.com_total, c.com_fecha, mp.tipo_modo, u.usu_nombre, mp.tipo_modo 
			 FROM compra c,usuarios u, modo_pago mp where u.usu_id = c.usu_id and mp.id_modo = c.id_modo 
			 AND com_nula = 0
			 ORDER BY c.com_fecha DESC
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

 	function consultaVenta($id)
 	{
 	$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM venta WHERE v_vendedor = '$id'");
		$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;	
	}

 function detalleVenta($id)
 	{
 		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT c.com_id, u.usu_nombre, u.usu_apellido,c.com_fecha, c.com_total, mp.tipo_modo 
			FROM compra c, usuarios u, modo_pago mp
			WHERE u.usu_id = c.usu_id
			AND mp.id_modo = c.id_modo
			AND c.com_id = $id");
		$res=mysql_query($sql, $link)or die("Error en: $sql: " . mysql_error());
		while($f=mysql_fetch_array($res))

		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;	


 	}
 	function detalleVenta2($id)
 	{
 		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT b.pro_cod, p.pro_nombre, b.bol_cantidad, b.bol_subtotal
				FROM productos p, boleta b, compra c
				WHERE c.com_id = b.com_id
				AND p.pro_cod = b.pro_cod
				AND b.com_id = $id");
		$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
		while($f=mysql_fetch_array($res))

		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;	


 	}

 function eliminarventa($id){
     
		$link=conectar();
		$sql="DELETE FROM venta WHERE v_id ='$id' ";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		if(mysql_affected_rows()>0)
		{
			return 'Se ha Eliminado el Producto de la Boleta';
		}
		mysql_close($link);
 }

 function consultaVendedor($id_vend)
 {
 	$link=conectar();
 	$a=array();
		$x=0;
		$sql="SELECT max(caja_id) FROM caja WHERE usu_id = $id_vend";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		while($row = mysql_fetch_assoc($res)) { 
		$ultimo=$row["max(caja_id)"];
	}
	return $ultimo;
	}
		

 function cierraCaja($id_vend,$ultimo)
 {
 	$link=conectar();
		$sql="UPDATE caja SET caja_hora_termino = (SELECT CURTIME()) WHERE caja_fecha = (SELECT CURDATE()) AND usu_id = '$id_vend' AND caja_id = $ultimo";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			return '1';
		}
		mysql_close($link);



 }
 function anulaVenta($id)
 {
 		$link=conectar();
		$sql="UPDATE compra SET com_nula = 1 WHERE com_id = '$id' ";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			return '1';
		}
		mysql_close($link);



 }

 function totalcapital()
 {
 	$link=conectar();
 	$sql="SELECT sum(pr.pro_precio_venta * pu.pu_cantidad) AS capital
	FROM producto_ubicacion pu, productos pr, ubicacion ubc
	WHERE pr.pro_id = pu.pro_id
	AND pu.ubc_id = ubc.ubc_id";
	$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
	while($row = mysql_fetch_assoc($res)) { 
	$total=$row["capital"];
	}

	return $total; 


 }

 function totalinversion()
 {
 	$link=conectar();
 	$sql="SELECT sum(pr.pro_precio_compra * pu.pu_cantidad) AS inversion
		FROM producto_ubicacion pu, productos pr, ubicacion ubc
		WHERE pr.pro_id = pu.pro_id
		AND pu.ubc_id = ubc.ubc_id";
	$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
	while($row = mysql_fetch_assoc($res)) { 
	$total=$row["inversion"];
	}

	return $total;


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

	function registraUsuario($nombre, $apellido, $nick, $pass, $tipo, $suc)
	{
		$x=0;
		$link=conectar();
		$sql="INSERT INTO usuarios (usu_nick, usu_clave, usu_nombre , usu_apellido , tip_id, suc_id) VALUES ('$nick', '$pass', '$nombre', '$apellido','$tipo', '$suc')";
		$res=mysql_query($sql,$link) or die("Error en: $sql: " . mysql_error());
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			$x=1;
		}
		return $x;
		mysql_close($link);
	}

	// Funciones Clientes

	function cuentaCliente()
	{
		$link = conectar();
		$x=0;
		$sql ="SELECT * FROM cliente" ;
		$res = mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
		$x= mysql_num_rows($res);
		mysql_close($link);
		return $x;
     }

     function muestraCliente($start,$reg)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM cliente ORDER BY cli_rut ASC  
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

	function buscaClienterut($codigo)
	{
		$link=conectar();
		$a=array();
		$x=0;
		$sql=("SELECT * FROM cliente WHERE cli_rut = '$codigo'");
		$res=mysql_query($sql, $link) or die("Error en: $sql: " . mysql_error());
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
	}

	function registraCliente($rut,$nombre, $apellido,$direccion,$telefono,$correo,$nick, $pass, $tipo, $comuna)
	{
		$x=0;
		$link=conectar();
		$sql="INSERT INTO cliente (cli_rut,cli_nombre,cli_apellido,cli_direccion,cli_telefono,cli_correo,cli_nick,cli_pass,com_id) VALUES ('$rut','$nombre', '$apellido','$direccion','$telefono','$correo','$nick', '$pass', '$tipo', '$comuna')";
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









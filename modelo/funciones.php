<?php

	//Función para Conectarse a la BD.
	function conectar()
	{
		$link=mysql_connect('localhost','root','','') or die("Error en la Conexion."); 	
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}

	function MuestraProductos()
		{
		$link=conectar();
		$a=array();
		$x=0;

		$sql=("SELECT pro_imagen FROM productos");
		$res=mysql_query($sql,$link);
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
	}

	function AgregaClientes($rut, $nombre, $apellido, $direccion, $telefono, $correo, $nick, $contraseña, $comuna)
	{
		$x=0;
		$link=conectar();
		$sql="INSERT INTO cliente (cli_rut, cli_nombre, cli_apellido, cli_direccion, cli_telefono, cli_correo, cli_nick, cli_pass, comu_id) VALUES ('$rut',' $nombre', '$apellido', '$direccion', '$telefono', '$correo', '$nick', '$contraseña', '$comuna')";
		$res=mysql_query($sql,$link);
		// Verificamos si se realizo el insert
		if(mysql_affected_rows()>0)
		{
			$x=1;
		}
		return $x;
		mysql_close($link);
	}

  function MuestraNoticias()
		{
		$link=conectar();
		$a=array();
		$x=0;

		$sql=("SELECT not_id, not_titulo, not_fecha,not_subtitulo,not_imagen  FROM noticias ORDER BY not_id DESC");
		$res=mysql_query($sql,$link);
		while($f=mysql_fetch_array($res))
		{
		    $a[$x]=$f;
		    $x++;
		}
		mysql_close($link);
		return $a;
	}

function MuestraNoticiasTodo($codigo)
{
    $link=conectar();
    $a=array();
    $x=0;

    $sql=("SELECT *  FROM noticias where not_id = $codigo");
    $res=mysql_query($sql,$link);
    while($f=mysql_fetch_array($res))
    {
        $a[$x]=$f;
        $x++;
    }
    mysql_close($link);
    return $a;
}



	function existeCliente($correo)
	{
		$link = conectar();
		$sql = "SELECT * FROM cliente WHERE cli_correo = '$correo'";
		$resultado = mysql_query($sql, $link);
		if(mysql_num_rows($resultado) > 0)
		{
			return '1';
		}
		mysql_close($link);
	}
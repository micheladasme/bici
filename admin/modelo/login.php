<?php
function conecta()
	{
		$link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion."); 	
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}


// Funcion Validador de Usuario Para Login	
	function validaLogin($nom,$cla)
  	{ 
  
  	$link= conecta();
    $sw=false;
    $sql="SELECT * FROM usuarios WHERE usu_nick = '$nom' AND usu_clave =  '$cla'";
    $res=mysql_query($sql,$link) or die("Error en: $busqueda: " . mysql_error());
    if($f=mysql_fetch_array($res))
      {     $sw=$f['usu_id'];
		
			}
    mysql_close($link);
	
	return $sw;   
  	}
	
	// funcion para mostrar el nombre del usuario.
	
	// funcion para filtrar por tipo de usuario.
	function retornaNivel($id){
			$x=0;
       $link=conecta();
       $sql="SELECT * FROM usuarios WHERE usu_id='$id'";
       $res=mysql_query($sql,$link) or die("Error en: $busqueda: " . mysql_error());
       if($f=mysql_fetch_array($res))
         $x=$f['tip_id'];
       mysql_close($link);  
       return $x;   
	}

function retornaNombrePorId($id)
	{$link=conecta();
    $sw='';
    $sql="SELECT * FROM usuarios WHERE usu_id= $id";
    $res=mysql_query($sql,$link) or die("Error en: $busqueda: " . mysql_error());
    if($f=mysql_fetch_array($res))
      {$sw=$f['usu_nombre'];}
    mysql_close($link);
    return $sw;
	
	}


?>
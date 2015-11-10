<?php
function conecta()
	{
		$link=mysql_connect('localhost','root'/*'maskotin_admin'*/,''/*'mic.adasme123'*/) or die("Error en la Conexion."); 	
		mysql_select_db('sccycles',$link) or die("Error en la BD");
		mysql_query("SET NAMES 'utf8'");
		return $link;
	}


function cryptPass($password, $rounds=9){
    $salt="";
    $saltChars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    
    for($i=0; $i < 22; $i++){
        $salt.= $saltChars[array_rand($saltChars)];
    }
    return crypt($password, sprintf('$2y$%02d$', $rounds). $salt);   

}


// Funcion Validador de Usuario Para Login	
	function validaLogin($nom,$cla)
  	{ 
  
  	$link= conecta();
    $sw=false;
    $sql="SELECT * FROM cliente WHERE cli_correo = '$nom'";   
    $res=mysql_query($sql,$link) or die("Error en: $busqueda: " . mysql_error());
    if($f=mysql_fetch_array($res))
      {     
        if(password_verify($cla, $f['cli_pass'])) {
          $sw=$f['cli_id'];
        }
     
			}
      mysql_close($link);
	   return $sw;   
  	}
	
	// funcion para mostrar el nombre del usuario.

function retornaNombrePorId($id)
	{$link=conecta();
    $sw='';
    $sql="SELECT * FROM cliente WHERE cli_id= $id";
    $res=mysql_query($sql,$link) or die("Error en: $busqueda: " . mysql_error());
    if($f=mysql_fetch_array($res))
      {
        $sw=$f['cli_nombre']." ".$f['cli_apellido'];
      }
    mysql_close($link);
    return $sw;
	
	}

?>
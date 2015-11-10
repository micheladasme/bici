<?php
session_start();
include_once('../modelo/modelo_cliente.php');

if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}


$link = conectar();
$consulta = "select com.comu_id , com.comu_nombre from comuna com order by comu_nombre;";
$result=mysql_query($consulta , $link);
$res = muestraCliente();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/paginate.js"></script>
      <script src="../js/custom.js"></script>
     <script type="text/javascript">
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }
      
       $('.dropdown-toggle').dropdown()

    function modalEdit(id){

    $.ajax({
    url: "/control/controlModalECliente.php", // link of your "whatever" php
    async: true,
    cache: false,
    type: "POST",
    data:{codigo:id}, // all data will be passed here
    success: function(data){
        $("#divModal").html(data);

    }
    });
    }


     </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:auto;">
           <h3 class="text-center">Ver Cliente</h3><hr>
           
           <form id="iform" name="iform">
            <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Rut..." required/>
                <div class="input-group-btn">
                 <button type="submit" class="btn btn-default" id="btn_consulta">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </div>
          </div>
           </form>
           <br>
           <br>
           <br>
           <table class="table">
            <thead>
                    <tr>
                        <th>
                            RUT
                        </th>
                        <th>
                             Nombre 
                        </th>
                        <th>
                             Apellido 
                        </th>
                         <th>
                            Correo
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Direccion
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Accion
                        </th>
                    </tr>

            </thead>
             <tbody>
           <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = buscaClienterut($_GET['txt_consulta']);
              foreach ($res2 as $f) {
           echo (
            "<tr class='post'>".
           
            "<td>".$f['cli_rut']."</td>".
            "<td>".$f['cli_nombre']."</td>".
            "<td>".$f['cli_apellido']."</td>".
            "<td>".$f['cli_correo']."</td>".
            "<td>".$f['cli_telefono']."</td>".
            "<td>".$f['cli_direccion']."</td>".
            "<td>".$f['cli_correo']."</td>".
            "<td><a href='vista_ver_cliente.php?codigo=".$f['cli_rut']."' class='btn btn-sm btn-info'><span
                            class='glyphicon glyphicon-plus-sign'></span> Modificar </a></td>".
           

            "</tr>"
            );

           
             }
        }  

              else 
              {



                ?>  


            <?php if($res==true) { ?>
           
          
          <?php
    
          // Llenamos la tabla
            foreach($res as $f)
          {
          ?>
          <tr class="post">
              <th style="font-weight:100"><?php echo $f['cli_rut']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_nombre']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_apellido']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_correo']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_telefono']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_direccion']; ?></th>
              <th style="font-weight:100"><?php echo $f['cli_correo']; ?></th>
              <td> <a href='vista_ver_cliente.php?codigo=<?php echo $f['cli_rut']; ?>' class='btn btn-sm btn-info'><span
                            class='glyphicon glyphicon-plus-sign'></span> Modificar </a>  </td>         
          </tr>
<?php
    }
?>
            
 <?php } 
             else 
             {
               echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Clientes</h4></td></tr>");
             } 

           }?>
           </tbody>  
           </table>
            <?php include('/includes/paginador.php'); ?>
             <?php include('/includes/footer.php');  ?>
             <?php include('/modal/modal_modificar_cliente.php'); ?>
  </body>
</html>
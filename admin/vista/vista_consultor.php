<?php
session_start();
include('../modelo/funciones.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
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
     <script type="text/javascript">
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../salir.php";
        else
             return 0;
      }

      
       $('.dropdown-toggle').dropdown()

     </script>
 </head>

  <body>

   
       <?php print($_SESSION['header']);  ?>
       
          <div class="well" style="height:800px;">
           <h3 class="text-center">Consulta Precio</h3>
           <hr>
           <br>
            <form id="iform" name="iform">
              <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Codigo..." required/>
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

                            Codigo

                        </th>
                        <th>

                            Nombre

                        </th>
                        <th>

                            Precio

                        </th>
                    </tr>

            </thead>
            <tbody>
              <?php
              if(isset($_GET['txt_consulta']))
          {
              $res = buscaProducto($_GET['txt_consulta']);
              foreach ($res as $f) {
           echo (
            "<tr id ='tdx'>".
            "<form id='vform' method='post' action='../control/superadmin/controlRVenta.php'>".
            "<td><input type='text' id='txt_codigo' name='txt_codigo' class='form-control' value='".$f['pro_cod']."' readonly/></td>".
            "<td><input type='text'  id='txt_nombre' name='txt_nombre' class='form-control' value='".$f['pro_nombre']."' readonly/></td>".
             "<td><input type='text' id='txt_valor' name='txt_valor' class='form-control' value='".$f['pro_precio_venta']."' readonly/></td>".
            "</form>".

            "</tr>"
            );

           
             }
        }else
        {
          echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;Busque Producto...</h4></td></tr>");

        }



                ?>
            </tbody>

           </table>



          </div>
           <br>
           <br>
             <?php include('/includes/footer.php');  ?>
     </div>
  </body>
</html>
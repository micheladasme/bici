<?php
session_start();
include('../../modelo/funciones.php');


if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../../css/stock.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
     <script type="text/javascript">

      function ValidaSoloNumeros() {
        var code =event.charCode || event.keyCode;
        if ((code< 48) || (code> 57)){
        if(window.event){
        event.returnValue = false;
        }else{
        event.preventDefault();
        }

        }
        }

      function resta() {

             var total;
             nume1 = document.getElementById("txt_bodega");
             nume2 = document.getElementById("txt_tienda");
             resu = document.getElementById("txt_total");
             total = (nume1.value) - parseFloat(nume2.value);
             
             if(isset(total))
              {resu.value = total;}
            else
             {resu.value = 0;}
         }
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }
      
       $('.dropdown-toggle').dropdown()

     </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:800px;">
           <h3 class="text-center">Reponer Stock</h3><hr>
           <form id="iform" name="iform">
           <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Codigo..." required/>
                <div class="input-group-btn">
                 <button type="submit" class="btn btn-primary" id="btn_consulta">
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

                            Stock

                        </th>
                        <th>

                            Ubicacion

                        </th>
                        
                        
                    </tr>

            </thead>  
            <tbody>
               <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = existeStockBodega($_GET['txt_consulta']);
              if($res2==true){
              foreach ($res2 as $f) {
           echo (
            "<tr>".
            
            "<td>".$f['pro_cod']."</td>".
            "<td>".$f['pro_nombre']."</td>".
            "<td>".$f['pu_cantidad']."</td>".
            "<td>".$f['ubc_descripcion']."</td>".
            

            "</tr> "
            
            );

           
              

            }
          }
           else
            {
                echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No esta Producto en Bodega</h4></td></tr>");
             } 
           }    
             else 
             {
                echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No existe Producto</h4></td></tr>");
             } 

           ?>
             </tbody> </table> 
             <br>
             <br>
             <br>
            <form id='rform' method='post' action='../../control/superadmin/controlReponedor.php'>
              <div class="col-md-4 col-md-offset-4">
             <input type="hidden" id='txt_cod' name='txt_cod' value="<?php echo $f['pro_cod'] ?>" />
              Cantidad Bodega : <input type='text' id='txt_bodega' name='txt_bodega' class="form-control" value="<?php if(isset($f['pu_cantidad'])){echo $f['pu_cantidad'];} else {echo 0;} ?>" readonly/>  
              Cantidad a Reponer Tienda: <input type='number' id='txt_tienda' name='txt_tienda' class="form-control" onblur='resta()' autofocus/>  
              Queda en Bodega :<input type='text' id='txt_total' name='txt_total' class="form-control" value='0' readonly/> 
              </br>
              <button type='submit' id='btn_reponer' name='btn_reponer' class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-transfer"></span> Reponer</button> 
              </div>
              </form>
              
           
              <br>
    
           </div>
           <br>
           <br>
            <?php include('../includes/footer.php');  ?>
  </body>
</html>
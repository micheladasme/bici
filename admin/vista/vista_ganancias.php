<?php
session_start();
include('../../modelo/funciones.php');


if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}


//$res5 = $res2 + $res3 + $res4;
//$res6 = $res - $res5;



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Productos</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
    <link rel="stylesheet" type="text/css" href="../../css/caja.css"  />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
     <script type="text/javascript">
    
      
      function salir(){
         var respuesta=confirm('Desea realmente Cerrar Sesion?');
         if(respuesta==true)
             window.location="../../salir.php";
        else
             return 0;
      }
      
       $('.dropdown-toggle').dropdown()

       function ganancias()
       {
        var a= document.getElementById("1"); 
      var b= document.getElementById("2"); 
    var c=a+b; 
    return c;  

       }

     </script>
 </head>

  <body>

  <?php include($_SESSION['header']);  ?>

          <div class="well" style="height:800px;">
           <h3 class="text-center">Lista de Ganancias (Dia)</h3><hr>
           <br>
            <form> Seleccione Fecha :
           <input type="date" id="txt_fecha" name="txt_fecha"/>&nbsp; <input type="submit" id="btn_buscar" value="Buscar"/>
           </form>
           <br> 
           <table class="table table-hover table-bordered table-striped" >
            <thead>
              <tr>
                         <th>

                            Fecha

                        </th>
                        <th>

                            Ventas

                        </th>
                        <th>

                            Gasto Local

                        </th>
                      
                        <th>

                            Gasto Merma

                        </th>
                        <th>

                            Gasto Mercaderia

                        </th>
                         <th>

                            Total

                        </th>
                    </tr>


            </thead>
 <?php        

              $fecha=$_GET['txt_fecha'];
              $res=muestraGastos_Venta($fecha);
              $res2 =muestraGastos_Local($fecha);
              $res3 =muestraGastos_Merma($fecha);
              $res4 =muestraGastos_Mercaderia($fecha);
              
               

?>
                 
           <tbody>
               
      <tr>

       <th><?php echo $fecha ?></th>
      <?php
      // Llenamos la tabla
      foreach($res as $f1)
          {
    ?>
         
              <th id="1" style="font-weight:100"><?php echo $f1['sum(din_final)']; ?></th>
           <?php
          }

      ?>   
        <?php
      foreach($res2 as $f2)
          {
    ?>    
              <th id="2" style="font-weight:100"><?php echo $f2['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>

        <?php
      foreach($res3 as $f3)
          {
    ?>    
              <th id="3" style="font-weight:100"><?php echo $f3['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>


        <?php
      foreach($res4 as $f4)
          {
    ?>    
              <th id="4" style="font-weight:100"><?php echo $f4['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>
   
          <?php $total= $f1['sum(din_final)']-$f2['sum(gas_monto)']-$f3['sum(gas_monto)']-$f4['sum(gas_monto)'];?>
              <th id="5" style="font-weight:100"><?php echo $total; ?></th>
             
        
    
  

          </tr>
  
            

            </tbody>

           </table>
           <br>
           <br>
           <br>
           <br>

          <h3 class="text-center">Lista de Ganancias (Mes)</h3><hr>
           <br>
            <form>
           Desde : <input type="date" id="txt_fecha1" name="txt_fecha1"/>&nbsp;&nbsp;  Hasta: <input type="date" id="txt_fecha2" name="txt_fecha2"/>  <input type="submit" id="btn_buscar" value="Buscar"/>
           </form> 
           <br><br>
           <table class="table table-hover table-bordered table-striped" >
            <thead>
              <tr>
                         <th>

                            Fecha Inicio

                        </th>
                        <th>

                            Fecha Final

                        </th>
                        <th>

                            Ventas

                        </th>
                        <th>

                            Gasto Local

                        </th>
                      
                        <th>

                            Gasto Merma

                        </th>
                        <th>

                            Gasto Mercaderia

                        </th>
                         <th>

                            Total

                        </th>
                    </tr>


            </thead>
 <?php  
              $fecha1=$_GET['txt_fecha1'];
              $fecha2=$_GET['txt_fecha2'];
              $res1=muestraGastos_Venta2($fecha1,$fecha2);
              $res12 =muestraGastos_Local2($fecha1,$fecha2);
              $res13 =muestraGastos_Merma2($fecha1,$fecha2);
              $res14 =muestraGastos_Mercaderia2($fecha1,$fecha2);
              
               

?>
                 
           <tbody>
               
      <tr>

       <th><?php echo $fecha1?></th>
       <th><?php echo $fecha2?></th>
      <?php
      // Llenamos la tabla
      foreach($res1 as $x1)
          {
    ?>
         
              <th id="1" style="font-weight:100"><?php echo $x1['sum(din_final)']; ?></th>
           <?php
          }

      ?>   
        <?php
      foreach($res12 as $x2)
          {
    ?>    
              <th id="2" style="font-weight:100"><?php echo $x2['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>

        <?php
      foreach($res13 as $x3)
          {
    ?>    
              <th id="3" style="font-weight:100"><?php echo $x3['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>


        <?php
      foreach($res14 as $x4)
          {
    ?>    
              <th id="4" style="font-weight:100"><?php echo $x4['sum(gas_monto)']; ?></th>
              <?php
    }
  ?>
   
          <?php $total2= $x1['sum(din_final)']-$x2['sum(gas_monto)']-$x3['sum(gas_monto)']-$x4['sum(gas_monto)'];?>
              <th id="5" style="font-weight:100"><?php echo $total2; ?></th>
             
        
    
  

          </tr>
  
            

            </tbody>

           </table>



          </div>
           <br>
           <br>
            <?php include('../includes/footer.php');  ?>
  </body>
</html>
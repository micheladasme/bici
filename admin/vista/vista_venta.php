<?php
session_start();
include('../modelo/modelo_venta.php');
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />

      <script src="../js/jquery-1.11.3.min.js"></script>
      <script src="../js/bootstrap.min.js"></script> 
     <script type="text/javascript">


         function salir() {
             var respuesta = confirm('Desea realmente Cerrar Sesion?');
             if (respuesta == true)
                 window.location = "../salir.php";
             else
                 return 0;
         }

         $('.dropdown-toggle').dropdown()

         function multiplica() {

             var total;
             nume1 = document.getElementById('txt_valor');
             nume2 = document.getElementById("txt_cantidad");
             resu = document.getElementById("txt_subtotal");
             total = parseInt(nume1.value) * parseFloat(nume2.value);
             resu.value = total;
         }
         function borarlinea(id) {
             var ref = "../control/control_borrav.php?id=" + id;
            
            window.location = ref;

         }
         
    function asd()
    {
      document.getElementById('btnSave').click();
     
    }

        function calculo(cantidad,precio,inputtext,totaltext){
  
            // Calculo del subtotal
            subtotal = precio*cantidad;
            inputtext.value=subtotal;
            
                  //Calculo del total
            total = eval(totaltext.value);
            totaltext.value = total + subtotal;
          }
      
        </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:800px;">
           <h3 class="text-center">Venta</h3>
           <hr>
           <br>
          
           <form id="iform" name="iform">
            <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Codigo..." required/>
                <div class="input-group-btn">
                 <button type="submit" id="btn_consulta" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </div>
          </div>
           </form>
           <br>
           <br>
           <br>
           <br>

      <table id="tblData" class="table">          
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Sub Total</th>
            </tr>
        </thead>
          
        <tbody>
             
          <?php 
           $id = $_SESSION['id_usuario'];
          $res2 = consultaVenta($id);  
            foreach ($res2 as $f) {
           echo (
            "<tr id ='tdx'>".
            
            "<td><input type='text' id='txt_codigo1' name='txt_codigo1' class='form-control' value='".$f['v_codigo']."' readonly/></td>".
            "<td><input type='text'  id='txt_nombre1' name='txt_nombre1' class='form-control' value='".$f['v_nombre']."' readonly/></td>".
            "<td><input type='text' id='txt_cantidad1' name='txt_cantidad1' class='form-control' value='".$f['v_cantidad']."' readonly/></td>".
            "<td><input type='text' id='txt_valor1' name='txt_valor1' class='form-control' value='".$f['v_valor']."' readonly/></td>".
            "<td><input type='text' id='txt_subtotal1' name='txt_subtotal1' class='form-control' value='".$f['v_subtotal']."' readonly/></td>".
            "<td><input type='button'  value='Borrar' onclick='borarlinea(".$f['v_id'].")' /></td>".
           

            "</tr>"
            );

           
             }

          ?> 
          <?php
          
          if(isset($_GET['txt_consulta']))
          {
              $res = buscaProducto($_GET['txt_consulta']);             
              foreach ($res as $f) {
           echo (
            "<tr id ='tdx'>".
            "<form id='vform' method='post' action='../control/controlRVenta.php'>".
            "<td><input type='text' id='txt_codigo' name='txt_codigo' class='form-control' value='".$f['pro_cod']."' readonly/></td>".
            "<td><input type='text'  id='txt_nombre' name='txt_nombre' class='form-control' value='".$f['pro_nombre']."' readonly/></td>".
            "<td><input type='text' id='txt_cantidad' name='txt_cantidad' class='form-control' placeholder='Cantidad de Productos' name='txt_cantidad' onchange='multiplica();asd();' autofocus/></td>".
            "<td><input type='text' id='txt_valor' name='txt_valor' class='form-control' value='".$f['pro_precio_venta']."' readonly/></td>".
            "<td><input type='text' id='txt_subtotal' name='txt_subtotal' class='form-control' readonly/></td>".
         
            "<td><input type='submit' id='btnSave' class='btnSave' value='Guardar' style='display:none'/> <input type='button' class='btnDelete' value='Borrar'/></td>".
            "</form>".

            "</tr>"
            );

           
             }
           }
                ?>

             
           
        
        
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
              <?php $subtotal=consultasubtotal();?>
             
             <div class="row">
              <div class="col-lg-offset-9 col-lg-2">
                 <form name="f1" action="../control/controlPaga.php" method="post" >
                  <?php foreach ($subtotal as $g) {
                  echo "<p>Total Compra :   <input type='text' id='txt_compra' name='txt_compra' class='form-control' value='".$g['SUM( v_subtotal )']."' readonly/></p>";
                  } ?>
             
                Modo de Pago :
                 <?php $modo=devuelvemodo();
                    echo "<select name='modo' class='form-control'>";
                        foreach($modo as $re)
                        {
                            echo ("<option value='".$re['id_modo']."'>".$re['tipo_modo']."</option>");
                        }
                         echo "</select>";?>
                       </p>
                        
                 
                  <p>Paga :   
              <input type="text" id="txt_paga" name="txt_paga" class='form-control'/></p>
             <p>  
               <button type="submit" name="enviarpaga" class='btn btn-success  btn-lg btn-block'>
                <span class="glyphicon glyphicon-usd"></span> PAGAR
             </button>

                </p>
                </form>
           </div>
          </div>
          </div>

           <br>
           <br>
            <?php include('/includes/footer.php');  ?>
  </body>
</html>
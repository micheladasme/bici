<?php
session_start();
include_once('../../modelo/funciones.php');


if(!isset($_SESSION['usu_nombre']))
{header("location:../../index.php");}



$res = muestraSubCategorias();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <meta content="text/html" http-equiv="Content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido Administrador</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"  />
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

     </script>
 </head>

  <body>


  <?php include($_SESSION['header']);  ?>
          <div class="well" style="height:auto;">
           <h3 class="text-center">Ver Sub-Categorias</h3><hr>
           
           <form id="iform" name="iform">
            <div class="col-xs-6 col-md-4">
            <div class="input-group">
            <input type="text" id="txt_consulta" name="txt_consulta" class="form-control" placeholder="Busqueda por Nombre..." required/>
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
                            Codigo Sub-Categoria
                        </th>
                        <th>
                             Nombre Sub-Categoria
                        </th>
                         <th>
                            Categoria
                        </th>
                        <th>
                            Modificar 
                        </th>
                        

                    </tr>

            </thead>
             <tbody>
           <?php 
           if(isset($_GET['txt_consulta']))
          {
              $res2 = buscaSubCategoriasnom($_GET['txt_consulta']);
              foreach ($res2 as $f) {
           echo (
            "<tr class='post'>".
           
            "<td>".$f['subcat_id']."</td>".
            "<td>".$f['subcat_nombre']."</td>".
            "<td>".$f['cat_nombre']."</td>");
             echo ("<td><a href=");
            echo("javascript:window.open('vista_m_subcategoria.php?codigo=".$f['cat_id']."'".",'nuevo'".",'top=0,left=0,toolbar=no,location=no,status=no,"."menubar=no,scrollbars=no,resizable=no,"."width=500,height=470')");
          echo(" role='button' class='btn btn-sm btn-warning'><span class='glyphicon glyphicon-pencil'></span>&nbsp Modificar</a></td> </tr>"
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
              <th style="font-weight:100"><?php echo $f['subcat_id']; ?></th>
              <th style="font-weight:100"><?php echo $f['subcat_nombre']; ?></th>
              <th style="font-weight:100"><?php echo $f['cat_nombre']; ?></th>
              <th width="30px"><a href="javascript:window.open('vista_m_subcategoria.php?codigo=<?php echo $f['cat_id']; ?>', 'nuevo', 'top=0, left=0, toolbar=no,location=no, status=no,menubar=no,scrollbars=no, resizable=no, width=500,height=470')" role="button" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp Modificar</a></th>
              

              
          </tr>
<?php
    }
?>
            
 <?php } 
             else 
             {
               echo ("<tr><td><h4>&nbsp;&nbsp;&nbsp;No hay Sub-Categorias</h4></td></tr>");
             } 

           }?>
           </tbody>  
           </table>
              <?php include('../includes/paginador.php');  ?>
             <?php include('../includes/footer.php');  ?>
  </body>
</html>
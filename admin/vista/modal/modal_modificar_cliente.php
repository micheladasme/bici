<?php

if (isset($_GET['codigo'])) {
// Obtener variables
    $codigo = $_GET['codigo'];

// Llamar a la función.
    $datos = buscaClienterut($codigo);

// Llenamos los campos
foreach($datos as $d)
{

    ?>


    <div class="modal fade" id="myModal" aria-labelledby="gridSystemModalLabel" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" xmlns="http://www.w3.org/1999/html">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Modificar Cliente</h4>
                </div>
                <div class="modal-body">
                    <form id="iform"  method="POST" action="../control/controlMCliente.php" enctype="multipart/form-data">
                        <input type="hidden" id="txt_id" name="txtId" class="form-control" value="<?php echo $d['cli_id']; ?>">
                        <p> Rut : <input type="text" id="txt_rut" name="txtRut"  class="form-control" value="<?php echo $d['cli_rut']; ?>" readonly/>   </p>
                         <div class='row'>
                        <div class="col-md-6">
                         Nombre :  <input type="text" id="txt_nom" name="txtNom" class="form-control" value="<?php echo $d['cli_nombre']; ?>" required/>    
                         </div>
                         <div class="col-md-6">
                         Apellido :  <input type="text" id="txt_ape" name="txtApe"  class="form-control" value="<?php echo $d['cli_apellido']; ?>" required/>   
                        </div>
                        </div>
                        <p> Direccion :  <textarea rows="3" id="txt_dir" name="txtDir"  class="form-control" required> <?php echo $d['cli_direccion']; ?></textarea>  </p>
                        <p> Telefono :  <input type="text" id="txt_tel" name="txtTel" class="form-control" value="<?php echo $d['cli_telefono']; ?>" required/>
                            Correo :  <input type="email" id="txt_cor" name="txtCor" class="form-control" value="<?php echo $d['cli_correo']; ?>" required/></p>
                        <p> Contraseña :  <input type="password" id="txt_pass" name="txtPass" class="form-control" value="1234" required/>
                                <p> Comuna : <select name="selCom" id="sel_comuna" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php 
                                  while($fila=mysql_fetch_row($result)){
                                  echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";              
                                        }
                                  ?>
                                </select></p>
                        <?php
                        }
                        ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-warning" value="Modificar"/>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $("#myModal").modal("show");

    </script>

<?php } ?>
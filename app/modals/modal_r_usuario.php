<?php
include_once("../modelo/funciones.php");
$link = conectar();
$consulta = "select com.comu_id , com.comu_nombre from comuna com;";
$result=mysql_query($consulta , $link);
?>

<script type="text/javascript">
    function Valida_Rut( Objeto )
    {
        var tmpstr = "";
        var intlargo = Objeto.value
        if (intlargo.length> 0)
        {
            crut = Objeto.value
            largo = crut.length;
            if ( largo <2 )
            {
                alert('rut inválido')
                Objeto.focus()
                return false;
            }
            for ( i=0; i <crut.length ; i++ )
                if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
                {
                    tmpstr = tmpstr + crut.charAt(i);
                }
            rut = tmpstr;
            crut=tmpstr;
            largo = crut.length;
            if ( largo> 2 )
                rut = crut.substring(0, largo - 1);
            else
                rut = crut.charAt(0);
            dv = crut.charAt(largo-1);
            if ( rut == null || dv == null )
                return 0;
            var dvr = '0';
            suma = 0;
            mul  = 2;
            for (i= rut.length-1 ; i>= 0; i--)
            {
                suma = suma + rut.charAt(i) * mul;
                if (mul == 7)
                    mul = 2;
                else
                    mul++;
            }
            res = suma % 11;
            if (res==1)
                dvr = 'k';
            else if (res==0)
                dvr = '0';
            else
            {
                dvi = 11-res;
                dvr = dvi + "";
            }
            if ( dvr != dv.toLowerCase() )
            {
                alert('El Rut Ingreso es Invalido')
                Objeto.focus()
                return false;
            }
            pass_match();
            Objeto.focus()
            return true;
        }
    }



    function pass_match()
    {
         $pass1=document.getElementById('txt_pass').value;
         $pass2=document.getElementById('txt_pass2').value;

        if($pass1 != $pass2)
        {
            alert("las contraseñas no coincide");


        }
        else
        {
            document.forms["iform"].submit();
        }



    }

</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                    <form id="iform"  method="POST" action="control/controlRCliente.php" enctype="multipart/form-data">
                        <div class="col-md-3"> RUT : <input type="text" id="txt_cod" name="txt_cod" onkeypress="ValidaSoloNumeros()" class="form-control" required autofocus/>  </div>
                        <div class="col-md-3  col-md-offset-1"> Nombre :  <input type="text" id="txt_nom" name="txt_nom" class="form-control" required/>    </div>
                        <div class="col-md-3  col-md-offset-1"> Apellido :   <input type="text" id="txt_ape" name="txt_ape" class="form-control" required/>    </div>
                        <div> Direccion :  <textarea id="txt_dir" name="txt_dir" class="form-control" rows="2" required > </textarea> </div>
                        <div> Telefono : <input type="text" id="txt_tel" name="txt_tel" class="form-control" required/>   </div>
                        <div> Correo :  <input type="email" id="txt_correo" name="txt_correo" class="form-control" required/>   </div>
                        <p>
                        <div class="col-md-5  "> Contraseña :  <input type="password" id="txt_pass" name="txt_pass" class="form-control" required/>  </textarea>   </div>
                        <div class="col-md-5  col-md-offset-2"> Repita Contraseña :<input type="password" id="txt_pass2" name="txt_pass2" class="form-control" required/>  </textarea>   </div>
                        </p>
                        <p> Comuna : <select name="sel_comuna" id="sel_comuna" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <?php
                                while($fila=mysql_fetch_row($result)){
                                    echo"<option  value='".$fila['0']."'>".$fila['1']."</option>";
                                }
                                ?>
                            </select></p>
                        <!--<input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary btn-lg btn-block" value="Ingresar"/>-->

                        <div class="modal-footer">
                            <input type="button" id="btn_ingresar" name="btn_ingresar" class="btn btn-primary" value="Ingresar" onclick="pass_match()">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                                        </div>
                                    </div>
                                </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

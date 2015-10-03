<?php
  $res1 = muestraBarraManubrio(); 
  $res1 = muestraManillar();
  $res2 = muestraFrenosDelanteros();
  $res3 = muestraMandoCambio();

  
?>

    <script>
     function agregaRegistro(){
    var url = 'control/RPartes.php';
    //recorremos todos los checkbox seleccionados con .each
    /*$('input[name="rueda[]"]:checked').each(function() {
    //$(this).val() es el valor del checkbox correspondiente
    checkboxValues.push($(this).val());
     
    });
    alert(checkboxValues);*/
    var data = $("#iform").serialize(); 

                $.ajax({
                    url: url, // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: data, // all data will be passed here
                    success: function(data){ 
                        $("#comp").val(data); 
                        $("#modalManubrio").modal("hide");// The data that is echoed from the ajax.php
                    }
                });
   
    }
   </script>

  <div class="modal fade" id="modalManubrio" aria-labelledby="gridSystemModalLabel" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="gridSystemModalLabel">Manubrio</h3>
                </div>
                <div class="modal-body">
                    <form id="iform" method="POST">
                   <div class="panel-group" id="accordion"  role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseM1">
                                        Barra Manubrio</a>
                                </h4>
                            </div>
                            <div id="collapseM1" class="panel-collapse collapse">
                                <div class="row">
                                    <?php foreach ($res1 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h5><?php print($val["pro_nombre"]);?></h5>
                                                        <p>$<?php print($val["pro_precio_venta"]);?> - <?php print($val["pro_peso"]);?></p>
                                                        <p><input type="checkbox" id="barra" name="barra" value="<?php print($val['pro_cod'])?>"> Elegir<br> </p>
                                                    </div>
                                                    <img src="images/img250.png" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                            </div>
                        </div> 
                       

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseM2">
                                        Manillar</a>
                                </h4>
                            </div>
                            <div id="collapseM2" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res2 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="manillar" name="manillar" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                    <img src="images/img250.png" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseM3">
                                        Freno Delantero</a>
                                </h4>
                            </div>
                            <div id="collapseM3" class="panel-collapse collapse">
                                <div class="row">
                                    <?php foreach ($res3 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="frenoDel" name="frenoDel" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                    <img src="images/img250.png" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                           </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseM4">
                                        Mando Cambio Trasero</a>
                                </h4>
                            </div>
                            <div id="collapseM4" class="panel-collapse collapse">
                                <div class="row">
                                    <?php foreach ($res4 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="mandoCambioTra" name="mandoCambioTra" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                    <img src="images/img250.png" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                           </div>
                        </div>


                    </div>

                      
                 </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar" onclick="agregaRegistro()"/>
                </div>
           </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
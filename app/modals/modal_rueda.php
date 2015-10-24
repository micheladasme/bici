  <?php 
  $res8 = muestraLlantas();
  $res9 = muestraNeumaticos();
  $res10 = muestraFrenos();

  
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
                        //$("#comp").val(data);
                        tablaProductos(data);
                        $("#modalRueda").modal("hide");// The data that is echoed from the ajax.php
                    }
                });
   
    }
   </script>

  <div class="modal fade" id="modalRueda" aria-labelledby="gridSystemModalLabel" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="gridSystemModalLabel">Ruedas</h3>
                </div>
                <div class="modal-body">
                    <form id="iform" method="POST">
                   <div class="panel-group" id="accordion"  role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseR1">
                                        Neumaticos</a>
                                </h4>
                            </div>
                            <div id="collapseR1" class="panel-collapse collapse">
                                <div class="row" id="neumatico">
                                    <?php foreach ($res9 as $key => $valn) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($valn["pro_nombre"]);?></div>
                                                        <p>$<?php print($valn["pro_precio_venta"]);?> - <?php print($valn["pro_peso"]);?> grs.</p>
                                                        <p><div id="neuma" ><input type="checkbox" id="neumatico" name="neumatico" value="<?php print($valn['pro_cod'])?>"> Elegir<br> </div></p>
                                                    </div>
                                                    <img src="../<?php print($valn["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                            </div>
                        </div> 
                       

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseR2">
                                        Llantas</a>
                                </h4>
                            </div>
                            <div id="collapseR2" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res8 as $key => $vall) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($vall["pro_nombre"]);?></div>
                                                        <p>$<?php print($vall["pro_precio_venta"]);?> - <?php print($vall["pro_peso"]);?> grs.</p>
                                                       <p> <input type="checkbox" id="llanta" name="llanta" value="<?php print($vall['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                    <img src="../<?php print($vall["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseR3">
                                        Freno Trasero</a>
                                </h4>
                            </div>
                            <div id="collapseR3" class="panel-collapse collapse">
                                <div class="row">
                                    <?php foreach ($res10 as $key => $valf) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($valf["pro_nombre"]);?></div>
                                                        <p>$<?php print($valf["pro_precio_venta"]);?> - <?php print($valf["pro_peso"]);?> grs.</p>
                                                       <p> <input type="checkbox" id="frenoTra" name="frenoTra" value="<?php print($valf['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                    <img src="../<?php print($valf["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                           </div>
                        </div>

                    </div>

                      
                 </div>
                
                <div class="modal-footer">
                    <input type="button" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar" onclick="agregaRegistro()"/>
                </div>
           </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <?php 
  $res1 = muestraLlantas();
  $res2 = muestraNeumaticos();
  $res3 = muestraFrenos();

  
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                    <?php foreach ($res2 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h5><?php print($val["pro_nombre"]);?></h5>
                                                        <p>$<?php print($val["pro_precio_venta"]);?> - <?php print($val["pro_peso"]);?></p>
                                                        <p><div id="neuma"> <input type="checkbox" id="neumatico" name="parte" value="<?php print($val['pro_cod'])?>"> Elegir<br> </div></p>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseR2">
                                        Llantas</a>
                                </h4>
                            </div>
                            <div id="collapseR2" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res1 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="llantas" name="parte" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseR3">
                                        Freno Trasero</a>
                                </h4>
                            </div>
                            <div id="collapseR3" class="panel-collapse collapse">
                                <div class="row">
                                    <?php foreach ($res3 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="freno" name="parte" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
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

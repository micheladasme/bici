  <?php 
  $res1 = muestraLlantas();
  $res2 = muestraNeumaticos();
  $res3 = muestraFrenos();
  
  $lista = array();
  ?>

  <script type="text/javascript">

  function registro(prod,tipo,cat){
          $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {"prod" : prod, "tipo" : tipo, "cat": cat},
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "control/RPartes.php",
        })
         .done(function( data, textStatus, jqXHR ) {
            alert("La solicitud se ha completado correctamente." );
            
         })
         .fail(function( jqXHR, textStatus, errorThrown ) {
       
            alert("La solicitud a fallado: " +  textStatus);
             
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
                    <div class="panel-group" id="accordion"  role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Neumaticos</a>
                                </h4>
                            </div>
                            <div id="collapse1">
                                <div class="row">
                                    <?php foreach ($res2 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                        <p><a href="<?php print($val['pro_cod']);?>" class="label label-success" rel="tooltip" title="Elegir">Elegir</a></p>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Llantas</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res1 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <h4><?php print($val["pro_nombre"]);?></h4>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                        <p><a href="<?php print($val['pro_cod']);?>" class="label label-success" rel="tooltip" title="Elegir">Elegir</a></p>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Tipo de Freno</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="row">
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                </div>
                           </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Piñones</a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="row">    
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Cambio Trasero</a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="row">    
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                    <div class="col-sm-3"><a href="#x" class="thumbnail"><img src="images/img250.png" alt="Image" class="img-responsive"></a>
                                    </div>
                                 </div>   
                            </div>
                        </div>
                    </div>
           

                 </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar"/>
                </div>
           
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

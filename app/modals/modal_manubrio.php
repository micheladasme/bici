<?php

  $res4 = muestraManillar();
  $res5 = muestraGrips(); 
  $res6 = muestraFrenos();
  $res7 = muestraMandos();

  
?>

    <script>
$(function(){
    $('input.manillar').on('change', function() {
    $('input.manillar').not(this).prop('checked', false);  
    });

    $('input.grips').on('change', function() {
    $('input.grips').not(this).prop('checked', false);  
    });

     $('input.frenoDel').on('change', function() {
    $('input.frenoDel').not(this).prop('checked', false);  
    });

      $('input.mandoCambioTra').on('change', function() {
    $('input.mandoCambioTra').not(this).prop('checked', false);  
    });
});

     function agregaRegistroMa(){
    var url = 'control/RPartes.php';
    //recorremos todos los checkbox seleccionados con .each
    /*$('input[name="rueda[]"]:checked').each(function() {
    //$(this).val() es el valor del checkbox correspondiente
    checkboxValues.push($(this).val());
     
    });
    alert(checkboxValues);*/
    var data = $("#mform").serialize(); 

                $.ajax({
                    url: url, // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: data, // all data will be passed here
                    success: function(data){ 
                          tablaProductos(data);
                        $("#modalManubrio").modal("hide");// The data that is echoed from the ajax.php
                    }
                });
    }
   </script>

  <div class="modal fade" id="modalManubrio" aria-labelledby="gridSystemModalLabel" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   
                    <h3 class="modal-title" id="gridSystemModalLabel">Manubrio</h3>
                </div>
                <div class="modal-body">
                    <form id="mform" method="POST">
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
                                    <?php foreach ($res4 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($val["pro_nombre"]);?></div>
                                                        <p>$<?php print($val["pro_precio_venta"]);?> - <?php print($val["pro_peso"]);?></p>
                                                        <p><input type="checkbox" id="manillar" name="manillar" class="manillar" value="<?php print($val['pro_cod'])?>"> Elegir<br> </p>
                                                    </div>
                                                     <img src="../<?php print($val["pro_imagen"]);?>" alt="Image"  class="img-responsive"> 
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
                                        Grips</a>
                                </h4>
                            </div>
                            <div id="collapseM2" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res5 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($val["pro_nombre"]);?></div>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="grips" name="grips" class="grips" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                  <img src="../<?php print($val["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
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
                                    <?php foreach ($res6 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($val["pro_nombre"]);?></div>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="frenoDel" name="frenoDel" class="frenoDel" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                      <img src="../<?php print($val["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
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
                                    <?php foreach ($res7 as $key => $val) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($val["pro_nombre"]);?></div>
                                                        <p>$<?php print($val["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="mandoCambioTra" name="mandoCambioTra" class="mandoCambioTra" value="<?php print($val['pro_cod'])?>"> Elegir<br></p>
                                                    </div>
                                                     <img src="../<?php print($val["pro_imagen"]);?>" alt="Image" class="img-responsive"> 
                                                </div>
                                          </div>
                                       
                                    <?php } ?>
                                </div>
                           </div>
                        </div>


                    </div>

                      
                 </div>
                
                <div class="modal-footer">
                    <input type="button" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar" onclick="agregaRegistroMa()"/>
                </div>
           </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

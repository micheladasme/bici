<?php 
 
  $res12 = muestraPedal();


  
?>

    <script>

$(function(){
    $('input.pedal').on('change', function() {
    $('input.pedal').not(this).prop('checked', false);  
    });
});

     function agregaRegistroPe(){
    var url = 'control/RPartes.php';
    //recorremos todos los checkbox seleccionados con .each
    /*$('input[name="rueda[]"]:checked').each(function() {
    //$(this).val() es el valor del checkbox correspondiente
    checkboxValues.push($(this).val());
     
    });
    alert(checkboxValues);*/
    var data = $("#pform").serialize(); 

                $.ajax({
                    url: url, // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: data, // all data will be passed here
                    success: function(data){ 
                          tablaProductos(data);
                        $("#modalPedal").modal("hide");// The data that is echoed from the ajax.php
                    }
                });
   
    }
   </script>

  <div class="modal fade" id="modalPedal" aria-labelledby="gridSystemModalLabel" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="gridSystemModalLabel">Pedales</h3>
                </div>
                <div class="modal-body">
                    <form id="pform" method="POST">
                   <div class="panel-group" id="accordion"  role="tablist" aria-multiselectable="true">
                       
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseP1">
                                        Pedal</a>
                                </h4>
                            </div>
                            <div id="collapseP1" class="panel-collapse collapse">
                                <div class="row">
                                  <?php foreach ($res12 as $key => $ped) { ?>
                                        
                                    
                                     <div class="col-md-3">            
                                                <div class="thumbnail">
                                                    <div class="caption">
                                                        <div class="titu"><?php print($ped["pro_nombre"]);?></div>
                                                        <p>$<?php print($ped["pro_precio_venta"]);?></p>
                                                       <p> <input type="checkbox" id="pedal" name="pedal" class="pedal" value="<?php print($ped['pro_cod'])?>"> Elegir<br></p>
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
                    <input type="button" id="btn_ingresar" name="btn_ingresar" class="btn btn-success" value="Ingresar" onclick="agregaRegistroPe()"/>
                </div>
           </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

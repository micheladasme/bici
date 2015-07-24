<?php
 include("../modelo/modelo_cliente.php");
if(isset($_GET['term']))
{
    $nombre = $_GET['term'];

    echo json_encode(buscarClientenom($nombre));

}

?>
<?php
 session_start();
if(!isset($_SESSION['usu_nombre']))
{header("location:../index.php");}
include ('../modelo/modelo_venta.php');
$modo=$_POST['modo'];
$total=$_POST['txt_compra'];
$paga=$_POST['txt_paga'];
if($total>$paga&&$modo=1)
{
    echo "<script>window.alert('El dinero recibido no es suficiente');</script>";
    echo "<script>window.location = '../vista/vista_venta.php';</script>";
}
else{
$id_vend=$_SESSION['id_usuario'];
$x=ingresaEnc($modo,$total,$id_vend);
$y=retornaproc($id_vend);
foreach($y as $linea){
    $enc=retornaidenc();
foreach($enc as $f){
$en=$f['max(com_id)'];}
    $codigo=$linea['v_codigo'];
    $subtotal=$linea['v_subtotal'];
    $cant=$linea['v_cantidad'];
    $z=ingresaprocbol($codigo,$en,$subtotal,$cant);
    $en=restaStock($codigo,$cant);
}
$w=eliminaVenta($id_vend);
if($modo==1){
    $u=actualizacaja($total,$id_vend);
    
    $vuelto=$paga-$total;
    echo "<script>window.alert('El vuelto es de : $vuelto');</script>";
    echo "<script>window.alert('Venta realizada con Exito');</script>";
    echo "<script>window.location = '../vista/vista_venta.php';</script>";

}
else
    echo "<script>window.alert('Venta realizada con Exito');</script>";
    echo "<script>window.location = '../vista/vista_venta.php';</script>";
}
?>

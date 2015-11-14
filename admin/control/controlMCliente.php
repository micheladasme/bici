<?php
// Incluir Funciones.
include_once('../modelo/modelo_cliente.php');


// Obtenemos los Datos.
$id = $_POST['txtId'];
$rut = $_POST['txtRut'];
$nombre = $_POST['txtNom'];
$apellido = $_POST['txtApe'];
$dir = $_POST['txtDir'];
$tel = $_POST['txtTel'];
$correo = $_POST['txtCor'];
$pass = $_POST['txtPass'];
$comuna = $_POST['selCom'];

// Verificamos que no esten vacíos.
if($id=='' || $nombre == '' || $apellido == '' || $dir == ''  || $tel == '')
{

    ?>
    <script>
        // Enviamos un alert informando.
        alert('Debe rellenar todos los campos.');

        // Redirigimos a Inserta Producto.
        window.location="../vista/vista_ver_cliente.php";
    </script>
<?php
}else{

// Si los campos no estan vacios, hacemos la modificación.
$modificar = modificaCliente($id,$nombre,$apellido,$dir,$tel,$correo,$pass,$comuna);

if($modificar == 1)
{
    ?>
    <script>
        alert('El Cliente <?php echo $rut; ?> se ha modificado exitosamente.');
        window.close();
        window.location="../vista/vista_ver_cliente.php";
    </script>
<?php
}else
{
    ?>
    <script>
        alert('ERROR: Ha ocurrido un error al modificar el Cliente. Intente Nuevamente.');
        window.close();
    </script>
<?php
} }
?>
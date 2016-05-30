<?php
require_once('../conexionBD/conexionBD.php');

$correo = "esteban.kuh@gmail.com";
$tipoUsuario = 1;
$fecha2 = time();


$nickname = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$contrasena = $_POST['contrasena'];
$fecha = date("Y/m/d", $fecha2);

$consulta = "INSERT INTO usuario (idusuario ,tipoUsuario, nickname , nombre , apellido , pais , ciudad , contrasena , fechaingreso)
VALUES ( NULL ,'" . $tipoUsuario . "','" . $nickname . "','" . $nombre . "','" . $apellido . "','" . $pais . "','" . $ciudad . "','" . $contrasena . "','" . $fecha . "')";
mysqli_query($tienda,$consulta) or die(mysqli_error());

$valido = true;
$consulta2 = "SELECT * FROM usuario where nickname='$nickname' AND contrasena='$contrasena'";
$result = mysqli_query($tienda,$consulta2) or die(mysqli_error());
$filasn = mysqli_num_rows($result);
if ($filasn <= 0 || isset($_GET['nologin'])) {
    $valido = false;
} else {
    $rowsresult = mysqli_fetch_assoc($result);
    $_SESSION['idusuario'] = $rowsresult['idusuario'];
    //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
    $_SESSION["registrado"] = true;
    $_SESSION["usuario"] = $nickname;

    $_SESSION["nombre"] = $rowsresult['nombre'];
    $_SESSION["pais"] = $rowsresult['pais'];
    $_SESSION["ciudad"] = $rowsresult['ciudad'];
    echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';
    if ($rowsresult['tipoUsuario'] == 0) {
        header('Location: ../index.php?admin=true');
    } else {
        header('Location: ../index.php?admin=false');
    }
}
?>

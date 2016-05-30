<?php
require_once('../conexionBD/conexionBD.php');

//Esto por si el usuario no mete contraseña XD
error_reporting(E_ALL ^ E_NOTICE);

$idUsuario = $_SESSION["idusuario"];
$nickname = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$contrasena = $_POST['contrasena'];

if($contrasena==""){
    $contrasena = $_SESSION["contrasena"];
    $sql="UPDATE usuario SET nombre = '".$nombre."', apellido = '".$apellido."', pais = '".$pais."', ciudad = '".$ciudad."' WHERE idusuario ='".$idUsuario."' AND nickname = '".$nickname."'";
}else{
    $sql="UPDATE usuario SET nombre = '".$nombre."', apellido = '".$apellido."', pais = '".$pais."', ciudad = '".$ciudad."', contrasena = '".$contrasena."' WHERE idusuario ='".$idUsuario."' AND nickname = '".$nickname."'";
}

$resultado = mysqli_query($tienda, $sql);

    if ($resultado) {
        header('Location: editar_perfil.php?actualizado=exitoso');
    } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($tienda);
    }

?>


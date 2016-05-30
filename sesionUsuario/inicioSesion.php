<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../conexionBD/conexionBD.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

if(isset($_POST['enviar'])){
    $sql = "SELECT * FROM usuario WHERE nickname = '$usuario' and contrasena = '$contrasena'";
    $resultado = mysqli_query($tienda, $sql);
    $row = mysqli_fetch_assoc($resultado);
    if (mysqli_num_rows($resultado)>0){
        $_SESSION["registrado"] = true;
        $_SESSION["idusuario"] = $row['idusuario'];
        $_SESSION["nickname"] = $row['nickname'];
        $_SESSION["nombre"] = $row['nombre'];
        $_SESSION["apellido"] = $row['apellido'];
        $_SESSION["pais"] = $row['pais'];
        $_SESSION["ciudad"] = $row['ciudad'];
        $_SESSION["contrasena"] = $row['contrasena'];

        if($row['tipoUsuario'] == 0){
            $_SESSION["admin"] = true;
            header('Location: ../index.php');
        }else{
            $_SESSION["admin"] = false;
            header('Location: ../index.php');
        }
    }else{
        header('Location: nuevo_usuario.php?status=1');
    }
}
exit();

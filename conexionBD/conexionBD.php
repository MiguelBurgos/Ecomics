<?php
    header("Content-Type: text/html;charset=utf-8");
$hostname_tienda = "localhost";
$database_tienda = "tiendaweb";
$username_tienda = "root";
$password_tienda = "";
$tienda="";
$tienda = mysqli_connect($hostname_tienda, $username_tienda, $password_tienda,$database_tienda);
if (!$tienda) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
?>

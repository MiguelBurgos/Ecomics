<?php
    header("Content-Type: text/html;charset=UTF-8");
    require_once('../conexionBD/conexionBD.php');

$colname_detalle_productos = "-1";
if (isset($_GET['id_producto'])) {
    $colname_detalle_productos = $_GET['id_producto'];
}
$query_detalle_proce = sprintf("SELECT * FROM productos WHERE id_producto = ".$colname_detalle_productos);
$detalle_proce = mysqli_query($tienda, $query_detalle_proce) or die(mysql_error());
$row_detalle_producto = mysqli_fetch_assoc($detalle_proce);
$totalRows_detalle_proce = mysqli_num_rows($detalle_proce);
?>

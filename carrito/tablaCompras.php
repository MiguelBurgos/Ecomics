<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id_usuario = $_SESSION['idusuario'];
$sql = "SELECT * FROM compra where idusuario= $id_usuario";
$result = mysqli_query($tienda, $sql);
echo "<table id='table_usuarios'>";
if (mysqli_num_rows($result) > 0) {
// output data of each row
    echo "<tr>";
            echo "<th>Id de la compra</th>";
            echo "<th>Fecha de compra</th>";
            echo "<th>Nombre del producto</th>";
            echo "<th>Precio del producto</th>";
            echo "<th>Nombre del cliente</th>";
            echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
                $nombreProducto = getNombreProducto($row["id_producto"]);
                $precioProducto = getNombrePrecioProducto($row["id_producto"]);
                $nombreUsuario = getNombreUsuario($row["idusuario"]);
                echo "<tr>";
                echo "<td>" .$row["idcompra"]. "</td><td>"
                        .$row["fecha"]."</td><td>"
                        . $nombreProducto. "</td><td> "
                        . $precioProducto. "</td><td> "
                        . $nombreUsuario. "</td>";
                echo "</tr>";
        }
} else {
        echo "<tr><td>No se encontraron resultados<td></tr>";
}
echo "</table>";
mysqli_close($tienda);
function getNombreProducto($id_producto) {
    global $tienda;
    $sql = "SELECT * FROM productos where id_producto= $id_producto";
    $result = mysqli_query($tienda, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["nombre"];
}
function getNombrePrecioProducto($id_producto) {
    global $tienda;
    $sql = "SELECT * FROM productos where id_producto= $id_producto";
    $result = mysqli_query($tienda, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["precio"];
}
function getNombreUsuario($id_usuario) {
    global $tienda;
    $sql = "SELECT * FROM usuario where idusuario= $id_usuario";
    $result = mysqli_query($tienda, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["nombre"];
}
?>

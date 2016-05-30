<?php
include '../conexionBD/conexionBD.php';
error_reporting(0); // Por lo del correo, en el servidor funciona, en el XAMPP configurando sendmail también.

if (isset($_SESSION['carrito'])) {
    $compras = $_SESSION['carrito'];
    $pedido = "Pedido de productos eComic. <br><br>";
    $total = 0;
    for ($i = 0; $i <= count($compras) - 1; $i++) {
        if ($compras[$i] != NULL) {
            $pedido .= $compras[$i]['nombre'] . " ***** " . $compras[$i]['precio'] . " x " . $compras[$i]['cantidad'] .
                    " Total: " . $compras[$i]['precio'] * $compras[$i]['cantidad'] . " Pesos <br>";
            $total = $total + $compras[$i]['precio'] * $compras[$i]['cantidad'];
            insertDB($compras[$i]['nombre'], $compras[$i]['cantidad']);
        }
    }
    $pedido .= "<br><br>Total: " . $total;
    $asunto = "Pedido Tienda eComic";
    $nombre = $_POST['nombre'];
    $correo = $_POST['email'];
    $pedido .="<br><br>De: " . $nombre;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    $headers .= "From: support@ecomic.comxa.com" . "\r\n" .
                "BCC: esteban.kuh@gmail.com" . "\r\n";
//            "BCC: alejandroreyna.c@outlook.com";

    mail($correo,$asunto,$pedido,$headers);
    unset($_SESSION['carrito']);
}
function insertDB($producto, $cantidad) {
    $id_usuario = $_SESSION["idusuario"];
    global $tienda;
    $sql = "SELECT * FROM productos WHERE nombre = '$producto'";
    $resultado = mysqli_query($tienda, $sql);
    if (mysqli_num_rows($resultado)>0){
        while ($row = mysqli_fetch_assoc($resultado)) {
            $id_producto = $row['id_producto'];
        }
    }
    $sql = "insert into compra (id_producto, idusuario) values ('$id_producto', '$id_usuario')";
    for ($index = 0; $index < $cantidad; $index++) {
        $resultado = mysqli_query($tienda, $sql);
    }
    if (!$resultado) {
        echo "Error: " . $sql . "<br>" . mysqli_error($tienda);
    }
}
?>

<html>
<body>
<h1>Usted est&aacute; siendo redirigido a la plataforma de pago... espere un momento</h1>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="pago" id="pago">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="ecomic@compras.com">
<input type="hidden" name="item_name" value="Compra eComic">
<input type="hidden" name="amount" value="<?php echo $total;?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://localhost/ProyectoWeb/TiendaWeb/carrito/carritoMenu.php?compra=exitosa">
<input type="hidden" name="cancel_return" value="http://localhost/ProyectoWeb/TiendaWeb/carrito/carritoMenu.php?compra=fallida">
<img alt="" border="0" src="https://www.paypal.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>
<script >
	  function registrar(){
	  	document.pago.submit();
	  }
	  registrar();

	  </script>
</body>
</html>


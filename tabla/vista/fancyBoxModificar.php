<?php
	require ("../modelo/modelo.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var nombre = "", id_cat = "", precio = "", descripcion = "", imagen = "", id_producto = "";

	function modificarInformacion(){
		id_cat = document.getElementById("id_cat_editar").value;
		nombre = document.getElementById("nombre_editar").value;
		precio = document.getElementById("precio_editar").value;
		imagen = document.getElementById("imagen_editar").value;
		descripcion = document.getElementById("descripcion_editar").value;
		id_producto = document.getElementById("id_producto_editar").value;
		if(id_cat!="" && nombre!="" && precio!="" && imagen!="" && descripcion!=""){
			ajax_("../control/controlador.php?id_cat_editar="+id_cat+"&nombre_editar="+nombre+"&precio_editar="+precio+"&imagen_editar="+imagen+"&descripcion_editar="+descripcion+"&id_producto_editar="+id_producto);
		}else{
			alert("Ingrese toda la informacion.");
		}
	}

</script>
</head>

<body>
<form>
  <?php
		if(isset($_GET["id_cat"]) && isset($_GET["nombre"]) && isset($_GET["precio"]) && isset($_GET["imagen"]) && isset($_GET["descripcion"])){
			$id_producto=$_GET["id_producto"];
			$id_cat=$_GET["id_cat"];
			$nombre=$_GET["nombre"];
			$precio=$_GET["precio"];
			$imagen=$_GET["imagen"];
			$descripcion=$_GET["descripcion"];
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
    <input type="hidden" name="id_producto_editar" id="id_producto_editar" value="<?php echo $id_producto; ?>" />
    <tr>
      <td>ID Categor&iacute;a</td>
      <td><input type="text" name="id_cat_editar" id="id_cat_editar" value="<?php echo $id_cat; ?>" /></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre_editar" id="nombre_editar" value="<?php echo $nombre; ?>" /></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><input type="text" name="precio_editar" id="precio_editar"  value="<?php echo $precio; ?>" /></td>
    </tr>
    <tr>
      <td>Imagen</td>
      <td>
          <?php echo "<img width='100' height='120' src='../../imagenes/productos/detalle/".$imagen."'/>"; ?>
      </td>
    </tr>
    <tr>
      <td>Descripci&oacute;n</td>
      <td><input type="text" name="descripcion_editar" id="descripcion_editar" value="<?php echo $descripcion; ?>" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" name="boton" value="Modificar" onclick="modificarInformacion();" /></td>
    </tr>
  </table>
  <div id="resultado" align="center"></div>
</form>
<br />
<br />
<br />
</body>
</html>

<?php
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";
	//---------------------------------------------------------------------------------------------------------------------------
	if(isset($_GET["id_cat_editar"]) && isset($_GET["nombre_editar"]) && isset($_GET["precio_editar"]) && isset($_GET["imagen_editar"]) && isset($_GET["descripcion_editar"]) && isset($_GET["id_producto_editar"])){

			$objFormulario->modificarUsuario($_GET["id_cat_editar"],$_GET["nombre_editar"],$_GET["precio_editar"],$_GET["imagen_editar"],$_GET["descripcion_editar"],$_GET["id_producto_editar"]);
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------
	if(isset($_POST["id_cat"]) && isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["imagen"]) && isset($_POST["descripcion"])){
			$objFormulario->registrar($_POST["id_cat"],$_POST["nombre"],$_POST["precio"],$_POST["imagen"],$_POST["descripcion"]);

		}
	//-------------------------ELIMINAR USUARIO-------------------------
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar el registro?");
				if(confirmar){
					location.href="controlador.php?confirmacion=si&codigo_user=<?php echo $_GET["codigo"]; ?>";
				}else{
					location.href="../vista/modificarInformacion.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["codigo_user"]);
	}
?>

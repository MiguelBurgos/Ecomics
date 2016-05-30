<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../conexion/conexion.php";
	class Formulario{
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		function Formulario(){
			$this->conexion= new  Conexion();
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function registrar($id_cat, $nombre, $precio, $imagen, $descripcion){

			$queryRegistrar = "insert into productos (id_cat, nombre, precio, imagen, descripcion)
			values ('".$id_cat."', '".$nombre."', '".$precio."', '".$imagen."', '".$descripcion."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());

			if($registrar){
				echo "<script>location.href='../vista/index.php?mensaje=". $this->mensajeExito."';</script>";
			}else{
				echo "<script>location.href='../vista/index.php?mensaje=".$this->mensajeError."';</script>";
			}
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function listar(){
			$sql="select * from productos";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay productos registrados";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Categor&iacute;a</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Descripci&oacute;n</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){

                 if($row["id_cat"] == 1){
                    echo "<td align='center'>Manga</td>";
                 }elseif($row["id_cat"] == 2){
                     echo "<td align='center'>DC</td>";
                 }elseif($row["id_cat"] == 3){
                     echo "<td align='center'>Marvel</td>";
                 }

			echo "<td align='center'>".$row["nombre"]."</td>";
			echo "<td align='center'>".$row["precio"]."</td>";
			echo "<td align='center'>".$row["imagen"]."</td>";
			echo "<td align='center'>".$row["descripcion"]."</td>";

			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id_producto='.$row["id_producto"].'&id_cat='.$row["id_cat"].'&nombre='.$row["nombre"].'&precio='.$row["precio"].'&imagen='.$row["imagen"].'&descripcion='.$row["descripcion"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id_producto"]."'>Eliminar</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function modificarUsuario($id_cat, $nombre, $precio, $imagen, $descripcion, $id_producto){
			$queryUpdate = "update productos set id_cat = '".$id_cat."', nombre = '".$nombre."', precio = '".$precio."', imagen = '".$imagen."', descripcion = '".$descripcion."' where id_producto = ".$id_producto;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from productos where id_producto = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../vista/modificarInformacion.php';
				</script>";
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../vista/modificarInformacion.php';
				</script>";
				}
		}
		//--------------------------------------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select *
			from productos
			where id_cat like '%".$dato."%' OR nombre like '%".$dato."%' OR precio like '%".$dato."%' OR imagen like '%".$dato."%' OR descripcion like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>ID Categor&iacute;a</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Descripci&oacute;n</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<tr><td align='center'>".$row["id_cat"]."</td>";
			echo "<td align='center'>".$row["nombre"]."</td>";
			echo "<td align='center'>".$row["precio"]."</td>";
			echo "<td align='center'>".$row["imagen"]."</td>";
			echo "<td align='center'>".$row["descripcion"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id_producto='.$row["id_producto"].'&id_cat='.$row["id_cat"].'&nombre='.$row["nombre"].'&precio='.$row["precio"].'&imagen='.$row["imagen"].'&descripcion='.$row["descripcion"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id_producto"]."'>Eliminar</a></td></tr>";
			$i++;
			}
			}
			echo "</tbody></table>";
		}
	}
?>

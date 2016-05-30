<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include 'carrito.php'; ?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> eComic</title>
        <link href="../css/estiloHTML.css" type="text/css" rel="stylesheet" media="all" />
        <link href="../css/estilosClases.css" type="text/css" rel="stylesheet" />
        <link href="../css/estilosID.css" type="text/css" rel="stylesheet" />
        <script src="../js/validacion.js" type="text/javascript" charset="utf-8"></script>
        <script src="../js/efectos.js" type="text/javascript" charset="utf-8"></script>
    </head>

    <header id="main-header">
       <a id="logo-header" href="index.php">
            <span class="site-name">eComics</span>
        </a>

        <nav>
            <ul>
            <li><a href="../nosotros.php">Nosotros</a></li>
            <li><a href="../contacto.php"> Contacto       </a></li>
            <li><a href="../categorias/cat_menu.php">Productos</a></li>
            <li><a href="../carrito/carritoMenu.php">Carrito   </a></li>
            <?php
                if(isset($_SESSION["registrado"])){
                    echo "<li><a href = '../carrito/misCompras.php'>Mis compras</a></li>";
                }

                if(isset($_SESSION["admin"])){
                    if($_SESSION["admin"]){
                        echo "<li><a href = '../admin/listaUsuarios.php' class='main'>Usuarios</a></li>";
                    }
                }
            ?>
            </ul>
        </nav>

    </header>


    <body>
        <?php
            if(!isset($_SESSION["registrado"])){
                echo "<div id='header'>";
                    echo    "<div class='boton' onclick='divLogin()'>".
                                "Iniciar sesión".
                            "</div>";
                    echo "<div class='boton'>";
                        echo "<a href='../sesionUsuario/nuevo_usuario.php' title='Registrarse'>"."Registrarse"."</a>";
                    echo "</div>";
                echo "</div>";
            }else{
                echo "<div id='header'>";
                    echo" <p id='saludo'>Hola " . $_SESSION["nickname"]."!</p>";
                    echo "<div class='boton'>";
                        echo "<a href='../sesionUsuario/editar_perfil.php' title='Editar Perfil'>"."Editar Perfil"."</a>";
                    echo "</div>";
                    echo "<div class='boton'>";
                        echo "<a href='../sesionUsuario/cerrar_sesion.php' title='Cerrar sesion'>"."Cerrar sesión"."</a>";
                    echo "</div>";
                echo "</div>";
            }
        ?>

        <div id="total">
            <div id="contenido">
                <div id="cabeceraCuerpo">
                    <div class="titulo"><img width="80%" height="120px" src="../img/carrito.jpg"/></div>
                </div>
                <p style=" text-align:center; margin-bottom:10px; clear:both;"><br /><a href="javascript:history.back(1)">Regresar</a>
                </p>
                <br>
                    <table width="90%"  height="90%"border="1" align="center" id="tablacarrito">
                        <tr align="center" style="background-color:#008fbe; color:#fff">
                            <td width="27%">PRODUCTO</td>
                            <td width="18%">PRECIO</td>
                            <td width="37%">CANTIDAD</td>
                            <td width="18%">TOTAL</td>
                        </tr>
        <?php
            if (isset($_SESSION['carrito'])) {
                $total = 0;
                for ($i = 0; $i <= count($compras) - 1; $i++) {
                    if ($compras[$i] != NULL) {
        ?>
                        <tr align="center">
                            <td required>
                                <?php echo $compras[$i]['nombre']; ?>
                            </td>
                            <td>
                                <?php echo $compras[$i]['precio']; ?>
                            </td>
                            <td>
                                <form name="form1" method="post" action="">
                                    <input type="hidden" name="id" id="id" value="<?php echo $i; ?>" />
                                    <input type="text" name="cantidadactualizada" value="<?php echo $compras[$i]['cantidad']; ?>"  size="2" required/>
                                    <span id="toolTipBox" width="200"></span>
                                    <input type="image" name="actualizar" class="iconCarrito" src="../imagenes/actualizar.gif" onmouseover="toolTip('Presione para actualizar su pedido', this)"/>
                                </form>
                            </td>
                            <td>
                                <form method="post" action=""><?php echo $compras[$i]['cantidad'] * $compras[$i]['precio']; ?>
                                    <span id="toolTipBox" width="200"></span>
                                    <input name="id2" type="hidden" id="id2" value="<?php echo $i; ?>">
                                        <input type="image" name="imageField" class="iconCarrito" src="../imagenes/eliminar.gif" onmouseover="toolTip('Presione para eliminar su pedido', this)" onclick="return confirm('¿Estas seguro?');"/>
                                </form>
                            </td>
                        </tr>
    <?php
                        $total = $total + ($compras[$i]['cantidad'] * $compras[$i]['precio']);
                    }
            }
        } else {
            if(isset($_GET['compra'])){
                if($_GET['compra']=="exitosa"){
                echo "<div class='success'>Compra realizada exitosamente</div>";
                }else{
                    echo "<div class='error'>No se realizó la compra</div>";
                }
            }else{
            echo "<div class='info'>No hay productos en el carrito</div>";
            }
        }
    ?>
                        <tr align="center">
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right">
                                <p>&nbsp;</p>
                                <p>TOTAL A PAGAR:</p>
                            </td>
                            <td>
                                <p>&nbsp;</p>
                                <p>
                                    <?php
                                        if (isset($_SESSION['carrito'])) {
                                            echo "$ " . $total . " Dolares ";
                                        }
                                    ?>
                                </p>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right">&nbsp;</td>
                            <td>
                                <form name="form2" method="post" action="resumenc_compra.php">
                                    <?php
                                    if(isset ($_SESSION["carrito"])){
                                        echo "<input type='submit' name = 'button' id = 'button' value = 'Enviar pedido' />";
                                    }
                                    ?>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="pie">
                    <p>Copyright 2016 - eComic. Hecho para fines educativos</p>
                </div>
        </div>

        <div id="caja" class="ventana_flotante">
            <h1>Inicio de Sesión</h1>
            <form id="formulario" action="../sesionUsuario/inicioSesion.php" method="post" onsubmit="return validar(this);">
                <table>
                    <tr>
                        <td class="label">Usuario:</td>
                        <td><input type="text" name="usuario" value = ""/></td>
                    </tr>
                    <tr>
                        <td class="label">Contraseña:</td>
                        <td><input type="password" name="contrasena" value = ""/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td  class="label">
                            <input id="boton" name="enviar" type="submit" value="Enviar"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

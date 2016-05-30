<?php
session_start();
if (!isset($_SESSION["registrado"])) {
    header("Location:../sesionUsuario/nuevo_usuario.php");
}
if (isset($_SESSION['carrito'])) {
    $compras = $_SESSION['carrito'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                <div class="categorias">
                    <p id="titulo_resumenCompra">
                        <strong>Bienvenido: <?php echo $_SESSION["nombre"]; ?></strong>
                        <br/>
                        Este es el resumen de su compra, verifique su pedido e ingrese sus datos.
                    </p>
                    <br/><br/>
                    <form method="post" action="final.php">
                        <table width="90%"  height="90%"border="0" align="center" id="tablacarrito">
                            <tr align="center" style="background-color:#fff; color:#000">
                                <td>&nbsp;</td>
                                <td align="right">Nombre:</td>
                                <td>
                                    <label for="nombre"></label>
                                    <input type="text" name="nombre" id="nombre" size="50" value="<?php echo $_SESSION["nombre"]; ?>" required/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr align="center" style="background-color:#fff; color:#000">
                                <td height="39">&nbsp;</td>
                                <td align="right">E-Mail:</td>
                                <td>
                                    <label for="email"></label>
                                    <input type="email"  name="email" id="email" size="50" required/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr align="center" style="background-color:#008fbe; color:#fff">
                                <td width="27%" height="28" >PRODUCTO</td>
                                <td width="18%" >PRECIO</td>
                                <td width="37%" >CANTIDAD</td>
                                <td width="18%" >TOTAL</td>
                            </tr>
                            <?php
                            if (isset($_SESSION['carrito'])) {
                                $total = 0;
                                for ($i = 0; $i <= count($compras) - 1; $i++) {
                                    if ($compras[$i] != NULL) {
                                        ?>
                                        <tr align="center">
                                            <td>
                                                <?php echo $compras[$i]['nombre']; ?>
                                            </td>
                                            <td>
                                                <?php echo $compras[$i]['precio']; ?>
                                            </td>
                                            <td>
                                                <?php echo $compras[$i]['cantidad']; ?>
                                            </td>
                                            <td>
                                                <?php echo $compras[$i]['cantidad'] * $compras[$i]['precio']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $total = $total + ($compras[$i]['cantidad'] * $compras[$i]['precio']);
                                    }
                                }
                            }
                            ?>
                            <tr align="center">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td align="right">
                                    <p>&nbsp;</p>
                                    <p>TOTAL A PAGAR::</p>
                                </td>
                                <td>
                                    <p>&nbsp;</p>
                                    <p>
                                        <?php
                                        if (isset($_SESSION['carrito'])) {
                                            echo "$ " . $total . " Pesos";
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
                                    <input type="submit" name="button" id="button" value="Enviar pedido"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <div id="pie">
                <p>Copyright 2016 - eComic. Hecho para fines educativos</p>
            </div>
        </div>
    </body>
</html>

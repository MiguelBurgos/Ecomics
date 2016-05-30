<?php
require_once('../conexionBD/conexionBD.php');
$id_cat = 3;
require_once ('productos.php');
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
                <div id="cabeceraCuerpo">
                    <div class="titulo"><img id="tituloManga" src="../img/marvelTitulo.jpg"/></div>
                </div>

                <hr/>
                <div class="productos" id="productos">

                    <table width="100%" height="100%" border="0" align="center">
                        <?php
                        $contador = 0;

                        do {
                            if ($contador == 0) {
                                echo"<tr>";
                            }
                            $contador++;
                            ?>
                            <td>
                                <a href="detalles_menu.php?id_producto=<?php echo $row_listado['id_producto']; ?>"><img class="imageField" src="../imagenes/Marvel/<?php echo $row_listado['imagen']; ?>" width="200" height="200"/></a>
                                <h3><?php echo $row_listado['nombre']; ?></h3>
                                <p>$<?php echo $row_listado['precio']; ?></p>
                                <form name="form1" method="post" action="../carrito/carritoMenu.php">
                                    <input type="image" name="imageField" class="imageFieldCarIcon" src="../imagenes/comprar.gif"/>
                                    <input name="nombre" type="hidden" id="nombre" value="<?php echo $row_listado['nombre']; ?>"/>
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $row_listado['precio']; ?>"/>
                                    <input name="cantidad" type="hidden" id="cantidad" value="1"/>
                                </form>
                            </td>
                            <?php
                            if ($contador == 3) {
                                $contador = 0;
                                echo"</tr>";
                            }
                        } while ($row_listado = mysqli_fetch_assoc($listado));
                        ?>
                    </table>
                </div>
                <div id="paginacion">
                    <table width="255" border="0"  align="center" >
                        <tr>
                            <td>
                                <?php
                                if ($pageNum_listado > 0) { // Show if not first page
                                    ?>
                                    <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, 0, $queryString_listado); ?>">Primero</a>
                                    <?php
                                } // Show if not first page
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pageNum_listado > 0) { // Show if not first page
                                    ?>
                                    <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, max(0, $pageNum_listado - 1), $queryString_listado); ?>">Anterior</a>
                                    <?php
                                } // Show if not first page
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pageNum_listado < $totalPages_listado) { // Show if not last page
                                    ?>
                                    <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, min($totalPages_listado, $pageNum_listado + 1), $queryString_listado); ?>">Siguiente</a>
                                    <?php
                                } // Show if not last page
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pageNum_listado < $totalPages_listado) { // Show if not last page
                                    ?>
                                    <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, $totalPages_listado, $queryString_listado); ?>">&Uacute;ltimo</a>
                                    <?php
                                } // Show if not last page
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
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

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
                session_start();
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

                    <div class="titulo"><img src="../img/productos.jpg"/></div>
                    <div class="FR"></div>
                </div>


                <div style="clear:both">
                    <div class="FL">
                        <a href="cat_mangas.php"><img class="img_categorias" src="../img/manga.jpg"/></a>
                    </div>
                    <div class="FL">
                        <img src="../img/comic.jpg" class="img_categorias-comicsTitle"/>
                    </div>
                    <a href="cat_comics_marvel.php"><img class="img_categorias-comics" src="../img/Marvel.jpg"/></a>
                    <a href="cat_comics_dc.php"><img class="img_categorias-comics" src="../img/dc.jpg"/></a>
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

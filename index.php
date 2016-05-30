<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> eComic</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <link href="css/estiloHTML.css" type="text/css" rel="stylesheet" media="all" />
        <link href="css/estilosClases.css" type="text/css" rel="stylesheet" />
        <link href="css/estilosID.css" type="text/css" rel="stylesheet" />
        <script src="js/validacion.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/efectos.js" type="text/javascript" charset="utf-8"></script>
    </head>

     <header id="main-header">
       <a id="logo-header" href="index.php">
            <span class="site-name">eComics</span>
        </a>

        <nav>
            <ul>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="contacto.php"> Contacto       </a></li>
            <li><a href="categorias/cat_menu.php">Productos</a></li>
            <li><a href="carrito/carritoMenu.php">Carrito   </a></li>
            <?php
                session_start();
                if(isset($_SESSION["registrado"])){
                    echo "<li><a href = 'carrito/misCompras.php'>Mis compras</a></li>";
                }

                if(isset($_SESSION["admin"])){
                    if($_SESSION["admin"]){
                        echo "<li><a href = 'admin/listaUsuarios.php' class='main'>Usuarios</a></li>";
                        echo "<li><a href = 'tabla/vista/index.php' class='main'>Admon.</a></li>&nbsp";
                        echo "<li><a href = 'tabla/vista/modificarInformacion.php' class='main'>Lista Productos</a></li>&nbsp";
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
                        echo "<a href='sesionUsuario/nuevo_usuario.php' title='Registrarse'>"."Registrarse"."</a>";
                    echo "</div>";
                echo "</div>";
            }else{
                echo "<div id='header'>";
                    echo" <p id='saludo'>Hola " . $_SESSION["nickname"]."!</p>";
                    echo "<div class='boton'>";
                        echo "<a href='sesionUsuario/editar_perfil.php' title='Editar Perfil'>"."Editar Perfil"."</a>";
                    echo "</div>";
                    echo "<div class='boton'>";
                        echo "<a href='sesionUsuario/cerrar_sesion.php' title='Cerrar sesion'>"."Cerrar sesión"."</a>";
                    echo "</div>";
                echo "</div>";
            }
        ?>

        <div id="total">
            <div id="contenido">
                <div id="cabeceraCuerpo">
                    <div id="logo" ><img src="img/tiendaWebLogo.jpg" alt="logo"/></div>
                </div>
                <div class="news">
                    <div class="FL"><img src="img/nuevos.jpg"/></div>
                    <p align="center"><a href="categorias/cat_menu.php"><img src="img/bannerProducts.png"/></a></p>
                    <p id="pieContador">
                        <?php
                            if(isset($_COOKIE['contador'])){
                                // Caduca en un año
                                setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
                                $mensaje = '<small>Bienvenido a nuestra pagina, esta es su visita numero ' . $_COOKIE['contador'] .'</small>';
                            } else {
                                // Caduca en un año
                                setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
                                $mensaje = 'Bienvenido a nuestra página web';
                            }
                            echo $mensaje;
                        ?>
                    </p>
                </div>
            </div>

            <div id="pie">
                <p>Copyright 2016 - eComic. Hecho para fines educativos</p>
            </div>
        </div>


        <div id="caja" class="ventana_flotante">
            <h1>Inicio de Sesión</h1>
            <form id="formulario" action="sesionUsuario/inicioSesion.php" method="post" onsubmit="return validar(this);">
                <table>
                    <tr>

                        <td><input type="text" class="form-control" name="usuario" placeholder="Usuario " id="UserName" value = ""/></td>
                    </tr>
                    <tr>

                        <td><input type="password" class="form-control" name="contrasena" value = "" placeholder="Contraseña" id="Passwod"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td  class="label">
                            <input id="boton" class="log-btn" name="enviar" type="submit" value="Enviar"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

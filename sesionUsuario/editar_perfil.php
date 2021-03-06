<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (!isset($_SESSION["usuario"])) {

} else {
    $_SESSION["usuario"];
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
       <a id="logo-header" href="../index.php">
            <span class="logo"></span>
            <span class="site-name">eComic</span>
        </a>

        <nav>
            <ul>
            <li><a href="../nosotros.php">Nosotros</a></li>
            <li><a href="../carrito/carritoMenu.php">Carrito   </a></li>
            <li><a href="../contacto.php"> Contacto       </a></li>
            <li><a href="../categorias/cat_menu.php">Productos</a></li>
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
                echo "</div>";
            }else{
                echo "<div id='header'>";
                    echo" <p id='saludo'>Hola " . $_SESSION["nickname"]."!</p>";
                    echo "<div class='boton'>";
                        echo "<a href='cerrar_sesion.php' title='Cerrar sesion'>"."Cerrar sesión"."</a>";
                    echo "</div>";
                echo "</div>";
            }
        ?>

        <div id="total">
            <div id="contenido">
                <div id="cabeceraCuerpo">
                    <div id="navCuerpo">

                    </div>
                </div>

                <div id="registro">
                    <?php
                        if (isset($_GET['actualizado'])) {
                            echo "<div class='info'>Los cambios se guardaron exitosamente</div>";
                        }
                    ?>
                    <p><img src="../img/editarPerfil.jpg" style="float:left;"/></p>

                    <div class="registro_caja">
                        <fieldset>
                            <legend>Perfil</legend>
                            <form id="formulario" action="editarUsuario.php" method="post" onsubmit="return comparar_contra(this);">
                                <div>
                                    <label for="usuario">Usuario: </label>
                                    <input type="text" name="usuario" id="cursorNegado" size="50" value="<?php echo $_SESSION["nickname"]; ?>" readonly="readonly"/>
                                    <span id="validar-usuario"></span>
                                </div>
                                <div>
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION["nombre"]; ?>" required/>
                                    <span id="validar-nombre"></span>
                                </div>
                                <div>
                                    <label for="apellido">Apellido: </label>
                                    <input type="text" name="apellido" id="apellido" value="<?php echo $_SESSION["apellido"]; ?>" required/>
                                    <span id="validar-apellido"></span>
                                </div>
                                <div>
                                    <label for="pais">País: </label>
                                    <select name="pais" id="pais">
                                        <option name="pais" value="Mexico">México</option>
                                        <option name="pais" value="Guatemala">Guatemala</option>
                                        <option name="pais" value="Honduras">Honduras</option>
                                        <option name="pais" value="Cuba">Cuba</option>
                                    </select>
                                    <span id="validar-pais"></span>
                                </div>
                                <div>
                                    <label for="ciudad">Ciudad: </label>
                                    <input type="text" name="ciudad" id="ciudad" value="<?php echo $_SESSION["ciudad"]; ?>" required/>
                                    <span id="validar-ciudad"></span>
                                </div>
                                <div>
                                    <label>¿Desea cambiar la contraseña?</label>
                                    <div id="cambiarContrasena" onclick="mostrarCambioContrasena()">Si</div>
                                </div>
                                <div id="mostrarContrasena">

                                </div>
                                <div id="mostrarContrasena_vali">

                                </div>
                                <p id="envio">
                                    <input type="submit" name="enviar" id="enviar" value="Guardar" />
                                </p>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div id="pie">
                <p>Copyright 2016 - eComic. Hecho para fines educativos</p>
            </div>
        </div>

        <div id="caja" class="ventana_flotante">
            <h1>Inicio de Sesión</h1>
            <form id="formulario" action="inicioSesion.php" method="post" onsubmit="return validar(this);">
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

<?php
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
                echo "</div>";
            }else{
                echo "<div id='header'>";
                    echo" <p id='saludo'>Hola " . $_SESSION["nickname"]."!</p>";
                    echo "<div class='boton'>";
                        echo "<a href='editar_perfil.php' title='Editar Perfil'>"."Editar Perfil"."</a>";
                    echo "</div>";
                    echo "<div class='boton'>";
                        echo "<a href='cerrar_sesion.php' title='Cerrar sesion'>"."Cerrar sesión"."</a>";
                    echo "</div>";
                echo "</div>";
            }
        ?>

        <div id="total">
            <div id="contenido">
                <div id="cabeceraCuerpo">

                </div>

                <div id="registro">
                     <?php
                        if(isset($_GET["status"])){
                            if($_GET["status"]==1){
                                echo    "<div class='error'>".
                                        "<p>Usuario o contraseña inválidos.</p>".
                                        "</div>";
                            }
                        }
                    ?>
                    <p><img src="../imagenes/miembro.gif" style="float:left;"/></p>

                    <div class="registro_caja">
                        <fieldset>
                            <legend>Registro</legend>
                            <form id="formulario" action="registro.php" method="post" onsubmit="return comparar_contra(this);">
                                <div>
                                    <label for="usuario">Usuario: </label>
                                    <input type="text" name="usuario" id="usuario" required/>
                                    <span id="validar-usuario"></span>
                                </div>
                                <div>
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" name="nombre" id="nombre" required/>
                                    <span id="validar-nombre"></span>
                                </div>
                                <div>
                                    <label for="apellido">Apellido: </label>
                                    <input type="text" name="apellido" id="apellido" required/>
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
                                    <input type="text" name="ciudad" id="ciudad" required/>
                                    <span id="validar-ciudad"></span>
                                </div>
                                <div>
                                    <label for="contrasena">Contraseña: </label>
                                    <input type="password" name="contrasena" id="contrasena" required/>
                                </div>
                                <div>
                                    <label for="contrasena_vali">Repetir Contraseña: </label>
                                    <input type="password" name="contrasena_vali" id="contrasena_vali" required/>
                                    <span id="validar-contrasena"></span>
                                </div>
                                <p id="envio">
                                    <input type="submit" name="enviar" id="enviar" value="Enviar" />
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

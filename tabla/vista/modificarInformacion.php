<?php
        session_start();
	require("../modelo/modelo.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Editar Informaci&oacute;n</title>
        <link href="../../css/estiloHTML.css" type="text/css" rel="stylesheet" media="all" />
        <link href="../../css/estilosClases.css" type="text/css" rel="stylesheet" />
        <link href="../../css/estilosID.css" type="text/css" rel="stylesheet" />
        <script src="../../js/validacion.js" type="text/javascript" charset="utf-8"></script>
        <script src="../../js/efectos.js" type="text/javascript" charset="utf-8"></script>
	<!-- ----------------------------------------FANCYBOX-------------------------------------------------------------------- -->
	<!-- Add jQuery library -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.css?v=2.0.6" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay opening speed and opacity
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedIn : 500,
						opacity : 0.95
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background-color' : '#eee'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
.fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
}
</style>
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
if (!isset($_SESSION["registrado"])) {
    echo "<div id='header'>";
    echo "<div class='boton' onclick='divLogin()'>" .
    "Iniciar sesión" .
    "</div>";
    echo "<div class='boton'>";
    echo "<a href='../../sesionUsuario/nuevo_usuario.php' title='Registrarse'>" . "Registrarse" . "</a>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<div id='header'>";
    echo" <p id='saludo'>Hola " . $_SESSION["nickname"] . "!</p>";
    echo "<div class='boton'>";
    echo "<a href='../../sesionUsuario/editar_perfil.php' title='Editar Perfil'>" . "Editar Perfil" . "</a>";
    echo "</div>";
    echo "<div class='boton'>";
    echo "<a href='../../sesionUsuario/cerrar_sesion.php' title='Cerrar sesion'>" . "Cerrar sesión" . "</a>";
    echo "</div>";
    echo "</div>";
}
?>

        <div id="total">
            <div id="contenido">
                <br/><br/><br/><br/>
                <div class="contacto_caja" style="clear:both;">
                    <fieldset>
                        <legend>Editar Informaci&oacute;n</legend>
                        <form action="" method="post" id="formulario">
                            <input type="text" name="boxBuscar" id="boxBuscar" autofocus="autofocus" value="" placeholder="Ingrese un dato." />
                            <input type="submit" name="botonBuscar" value="Buscar" id="botonBuscar" style="width:55px"/>
                            <input type="submit" name="botonListar" value="Listar Todos" id="botonListar" style="width:80px"/>
                            <?php
                            if (isset($_POST["botonBuscar"]) && $_POST["boxBuscar"] != "") {
                                $objModelo->buscar($_POST["boxBuscar"]);
                            } else {
                                $objModelo->listar();
                            }
                            ?>

                        </form>
                    </fieldset>
                </div>
                
            </div>
            <div id="pie">
                <p>Copyright 2016 - eComic. Hecho para fines educativos</p>
            </div>
        </div>

        <div id="caja" class="ventana_flotante">
            <h1>Inicio de Sesi&oacute;n</h1>
            <form id="formulario" action="sesionUsuario/inicioSesion.php" method="post" onsubmit="return validar(this);">
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

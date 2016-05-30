/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var clic = 1;
function divLogin() {
    if (clic == 1) {
        document.getElementById("caja").style.height = "85%";
        clic = clic + 1;
    } else {
        document.getElementById("caja").style.height = "0px";
        clic = 1;
    }
}

var confirmar = 1;
function mostrarCambioContrasena(){
    var confirmarCambioContrasena = document.getElementById("cambiarContrasena");
    var divContrasena = document.getElementById("mostrarContrasena");
    var divContrasena_vali = document.getElementById("mostrarContrasena_vali");

    if(confirmar == 1){
        confirmarCambioContrasena.innerHTML = "No";
        divContrasena.innerHTML = "<label for='contrasena'>Nueva Contraseña: </label>\n\
                                    <input type='password' name='contrasena' id='contrasena' required/>";

        divContrasena_vali.innerHTML = "<label for='contrasena_vali'>Repetir Nueva Contraseña: </label>\n\
                                        <input type='password' name='contrasena_vali' id='contrasena_vali' required/>\n\
                                    <span id='validar-contrasena'></span>";

        confirmar++;
    }else{
        confirmarCambioContrasena.innerHTML = "Si";
        divContrasena.innerHTML = "";
        divContrasena_vali.innerHTML = "";
        confirmar = 1;
    }
}


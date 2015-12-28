/**
 * Funciones Javascript: functions.js 
 * @description: Controla las acciones del sistema web, requiere jquery
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>  
 * @version 2015-12-11
 * @since 2015-12-11
 */

// Variables Generales
var URL_API = 'http://localhost/salchimvc/app/api/index.php?';

// Propias de Pagina
if (idPagina == 'usuarios') {
    listarUsuarios();
}

if (idPagina == 'usuario_detalle') {
    var id = GetURLParameter('id');
    listarUsuario(id);
}


// Funciones
function listarUsuarios() {

    var URL_SERVICIO = URL_API + 'accion=listarUsuarios';

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        $.each(data, function (key, val) {
            salida += "<li id='" + data[key].id + "'>" + data[key].nombres + " " + data[key].paterno + " " + data[key].materno + "</li>";
        });
        $("#content").html(salida);
    });

}


function listarUsuario(id) {

    var URL_SERVICIO = URL_API + 'accion=listarUsuario&id=' + id;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "<div>" + data.nombres + " " + data.paterno + " " + data.materno + "</div>";
        $("#content").html(salida);
    });

}


// Get URL Parameter
function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

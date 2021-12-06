
function actualizarRegistro(idVideoJuego,idusuario) {
    let desplegable = document.getElementsByName(idVideoJuego);
    $.ajax({
        method: "GET",
        url: "actualizar.php",
        data: 'idUser=' + idusuario+"&idVideoJuego="+idVideoJuego+"&opcion="+ desplegable[0].value
    }).done(function (response) {
        location.reload();
        alert("Actualizado correctamente");
    });
}
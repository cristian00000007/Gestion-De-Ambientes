function Agregar(){
    var id = document.getElementById('seleccion').getAttribute('value');
    alert(id);
    var nombre;
    $("#principal").append("<div class='card'><h1>"+"'"+"{{ $info->Result_Nombre}}"+"'"+"</h1></div>");
}

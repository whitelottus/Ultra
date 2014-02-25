

$(document).ready(function(){
    $('#enviar').click(function(){
        $.ajax({
            type:'POST',
            url:'servletInsertarusuario',
            data:{
                nombre:$('nombre').val(),
                mail:$('#mail').val(),
                asunto:$('#asunto').val(),
                contenido:($('#contenido').val())
            },
            success:function(respuesta){
                $('#resultado').html(respuesta);
            }
        });
    });
});

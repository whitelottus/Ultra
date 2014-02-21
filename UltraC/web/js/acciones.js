

$(document).ready(function(){
    $('#enviar').click(function(){
        $.ajax({
            type:'POST',
            url:'servletInsertarusuario',
            data:{
                id:$('#id').val(),
                nombre:$('#nombre').val(),
                sueldo:$('#sueldo').val()
            },
            success:function(respuesta){
                $('#resultado').html(respuesta);
            }
        });
    });
});

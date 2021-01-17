$(document).ready(function () {
    $('#num_cuenta').change(function(){
        var id_cuenta = $(this).val();
        var dataString = "id=" + id_cuenta;
       // alert (dataString);
        $.ajax ({
            type: "POST",
            url: "../model/test.php",
            data: {id_cuenta: id_cuenta},
            dataType: "json",

            success: function(data) {
              $("#nombre").val(data.nombre);
              $("#apellido").val(data.apellido);
              $("#tipo_banco").val(data.banco);
              $("#cedula").val(data.cedula);

            }
        });
     });
});


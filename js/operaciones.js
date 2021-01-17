$(document).ready(function() {
    $('#login').click(function() {
        // Traemos los datos de los inputs
        var user = $('#user').val();
        var clave = $('#clave').val();
        // Envio de datos mediante Ajax
        // if($.trim(user).lenght>0 && $.trim(clave).lenght>0){
        $.ajax({
            method: 'POST',
            cache: false,
            url: '../controller/loginController.php',
            // primer parametro es la variable de php y el segundo es el dato que enviamos
            data: {
                user_php: user,
                clave_php: clave
            },
            // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
            beforeSend: function() {

            },
            // res = respuesta que da php mediante impresion de pantalla (echo)
            success: function(res) {
                    //alert(res);
                    if (res == 'error_1') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Por favor ingrese todos los campos ',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })
                    } // ERROR 1
                    else if (res == 'error_3') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Usuario o contraseña invalida, por favor intente nuevamente',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })
                    } // ERROR 3
                    else {
                        window.location.href = res
                    }
                } // SUCCESS
        }); //AJAX
    }); //CLICK
}); //DOCUMENT

$('#registro').click(function(){

  var form = $('#formulario_registro').serialize();

  $.ajax({
    method: 'POST',
    url: '../controller/registroController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Campos obligatorios, por favor llena el mail y las claves',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })
      }else if(res == 'error_2'){
        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Las claves deben ser iguales, por favor intente de nuevo',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })


      }else if(res == 'error_3'){
        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El correo que ingresaste ya se encuentra registrado',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })

      }else if(res == 'error_4'){
                Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Por favor ingresa un correo valido',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })

      }else{

        window.location.href = res ;
      }


    }
  });

});
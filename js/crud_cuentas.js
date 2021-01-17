  $(document).on('click','#btn-add',function(e) {
    var data = $("#user_form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "../model/agregar_cuenta.php",
      success: function(dataResult){
          //alert(dataResult);
          if(dataResult == "error_1"){

                      Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'EL NUMERO DE CUENTA DEBE CONTENER 20 DIGITOS',
                        })
          }

          if(dataResult == "error_2"){
              
                      Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'DEBE COMPLETAR TODOS LOS CAMPOS',
                        })
          }
          //alert(dataResult);
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $('#addEmployeeModal').modal('hide');
            alert('Usuario agregado Exitosamente!' );
                        location.reload();
          }
          else if(dataResult.statusCode==201){
             alert(dataResult);
          }
      }
    });
  });

$(document).on('click','.update',function(e) {
    var id=$(this).attr("data-id");
    var name=$(this).attr("data-num_cuenta");
    var email=$(this).attr("data-banco");
    var phone=$(this).attr("data-nombre");
    var city=$(this).attr("data-apellido");
    var cedula=$(this).attr("data-cedula");
    $('#id_u').val(id);
    $('#num_cuenta_u').val(name);
    $('#banco_u').val(email);
    $('#nombre_u').val(phone);
    $('#apellido_u').val(city);
    $('#cedula_u').val(cedula);
  });

  $(document).on('click','#update',function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "../model/agregar_cuenta.php",
      success: function(dataResult){
          if(dataResult == "error_1"){

                      Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'INGRESE UN TIPO DE BANCO',
                        })
          }
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $('#editEmployeeModal').modal('hide');
                      Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'Edición Exitosa',
                             showConfirmButton: false,
                             timer: 1500
                      })
                        location.reload();
          }
          else if(dataResult.statusCode==201){
             alert(dataResult);
          }
      }
    });
  });

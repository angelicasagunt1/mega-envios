
<?php
include '../model/conexion_db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data</title>
    <?php ob_start()?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/crud.js"></script>
</head>
<body>

    <div class="container">
    <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Control de <b>Clientes Mega Envios</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Agregar Nuevo Cliente</span></a>
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Borrar</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombre y Apellido</th>
                     <!--   <th>Apellido</th>-->
                        <th>Telefono</th>
                        <th>DNI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                <?php
$result = mysqli_query($conn, "SELECT * FROM cliente");
$i = 1;
while ($row = mysqli_fetch_array($result)) {
	?>
                <tr id="<?php echo $row["id_cliente"]; ?>">
                <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id_cliente"]; ?>">
                                <label for="checkbox2"></label>
                            </span>
                        </td>
                    <!--<td><?php //echo $i; ?></td>-->
                    <td><?php echo $row["id_cliente"]; ?></td>
                    <td><?php echo $row["codigo"]; ?></td>
                    <td><?php echo $row["nombre_cliente"]; ?></td>
                    <td><?php echo $row["apellido_cliente"]; ?></td>
                    <!--<td><?php //echo $row["telefono_cliente"]; ?></td>-->
                    <td><?php echo $row["dni"]; ?></td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons update" data-toggle="tooltip"
                            data-id="<?php echo $row["id_cliente"]; ?>"
                            data-name="<?php echo $row["nombre_cliente"]; ?>"
                            data-apellido="<?php echo $row["apellido_cliente"]; ?>"
                            data-telefono="<?php echo $row["telefono_cliente"]; ?>"
                            data-dni="<?php echo $row["dni"]; ?>"
                            title="Editar"></i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id_cliente"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                         title="Borrar"></i></a>
                    </td>
                </tr>
                <?php
$i++;
}?>

                </tbody>
            </table>
      </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" id="id_cliente" name="codigo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre y Apellido</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <!--<label>Apellido</label>-->
                            <input type="hidden" id="apellido" name="apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" id="dni" name="dni" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Clientes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="name_u" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <!-- <label>Apellido</label>-->
                            <input type="hidden" id="apellido_u" name="apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="phone" id="telefono_u" name="telefono" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="city" id="dni_u" name="dni" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="update">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h4 class="modal-title">Borrar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id_cliente" class="form-control">
                        <p>¿Estás seguro que deseas borrar este registro?</p>
                        <p class="text-warning"><small>Está acción no se puede deshacer</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <button type="button" class="btn btn-danger" id="delete">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean()?>
 <?php include '../layout.php'?>
</body>
<script type="text/javascript">

$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: 'backend/save1.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    });
}


    $(document).on('keyup','#caja_busqueda', function(){
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
});
</script>
</html>
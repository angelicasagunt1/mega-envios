	$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "../model/clientes_model.php",
			success: function(dataResult){
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
		var name=$(this).attr("data-name");
		var apellido=$(this).attr("data-apellido");
		var telefono=$(this).attr("data-telefono");
		var dni=$(this).attr("data-dni");
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#apellido_u').val(apellido);
		$('#telefono_u').val(telefono);
		$('#dni_u').val(dni);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "../model/clientes_model.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						alert('Moficación Exitosa !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "../model/clientes_model.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Selecciona al menos un registro"); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Esás seguro/a de querer borrar "+(user.length>1?"estos":"this")+" registros?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "../model/clientes_model.php",
					cache:false,
					data:{
						type: 4,						
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {	
							$("#"+ids[i]).remove(); 
						}	
					} 
				}); 
			}  
		} 
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});
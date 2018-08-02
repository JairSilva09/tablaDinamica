jQuery(document).ready(function($) {
	cambiarPag(0);		

	$('#pieTabla').load('componentes/pieTabla.php');
	$('#buscador').load('componentes/buscar.php');

	$('#guardarNuevo').on('click',function(event) {
		c=$('#codigo').val();
		n=$('#nombre').val();
		d=$('#departamento').val();
		datos = {codigo:c,nombre:n,departamento:d};
		$.post('php/agregarDatos.php',datos,function(data) {
			if (data==1) {
				alertify.success('Registro agregado con éxito');
				$('input').val('');	
				$('#tabla').load('componentes/tabla.php');	
				paginar();	
				
			}else{
				alertify.error('No se ha agregado el registro');				
			}
		});		
	});	
	$('#actualizar').on('click',function(event) {
		nuevoCod = $('#codigo-up').val();
		nuevoNom = $('#nombre-up').val();
		nuevoDep = $('#departamento-up').val();		
		datos = {codigo:nuevoCod,nombre:nuevoNom,departamento:nuevoDep};
			$.post('php/editar.php',datos, function(data) {
			if (data==1) {
				alertify.success('Registro actualizado');
				$('input').val('');	
				$('#tabla').load('componentes/tabla.php');			
				
			}else{
				alertify.error(data);				
			}
			
		});
		
	});

	$('.eliminar').on('click',function(event) {
		cod = $(this).attr('id');
		$.post('php/eliminarRegistro.php', {codigo:cod}, function(data) {
			if (data==1) {
				alertify.success('El registro se ha eliminado');		
				$('#tabla').load('componentes/tabla.php');			
				
			}else{
				alertify.error('No se ha eliminado el registro');
				
			}
			
		});
		
	});	
});
$(document).on('keyup', '#buscar', function(event) {
	var valorBusqueda =	$(this).val();	
	if(valorBusqueda != ""){
			criterioBusqueda(valorBusqueda);
		}else{
			
			criterioBusqueda("");
		}	
});

function buscar_datos(c){
	datos = c.split("||");		
	$('#codigo-up').val(datos[0]);
	$('#nombre-up').val(datos[1]);
	$('#departamento-up').val(datos[2]);	

}
function eliminarR(n,c){
	$('.eliminar').attr('id',c);		
	$('#nomProducto').html(n);	
}
function criterioBusqueda(valor){
	$.ajax({
		url: 'componentes/tabla.php',
		type: 'post',
		dataType: 'html',
		data: {producto:valor},
	})
	.done(function(respuesta) {
		$('#tabla').html(respuesta); 
	})
	
}
 function cambiarPag(pag){
    $.ajax({        
        url: 'componentes/tabla.php',
        type: 'post',
        dataType: 'html',
        data: {pagina:pag},
    })
    .done(function(respuesta){
        $('#tabla').html(respuesta);             
    });  	
 }
  
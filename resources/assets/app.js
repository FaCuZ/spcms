$(function(){

	$(document).on("click", ".open-dialog", function () {
		var accion = $(this).data('accion');
		var titulo = $(this).data('titulo');

		$('.modal-header h4').html(titulo);

		$('#hidden-asunto').val(titulo);
		$('#hidden-accion').val(accion);
		
		$('.fl-nueva, .fl-borrar, .fl-cambio').hide();
		$('.fl-'+accion).show();

	 	$('#emailModal').modal('show');
	});
	
});
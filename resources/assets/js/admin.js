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
	
	$(document).on("click", ".galeria_item", function () {
		var activo = $(this).find('i').hasClass("fa-folder-open-o")

		if(activo){
			$('.nav-tabs li.active').removeClass('active');
			$('.tab-content div.active').removeClass('active');
		} 

		$('.galeria_item').find('i').removeClass('fa-folder-open-o');
		$('.galeria_item').find('i').addClass('fa-folder-o');

		if(!activo){
			$(this).find('i').removeClass('fa-folder-o');		
			$(this).find('i').addClass('fa-folder-open-o');
		}
	});


	$(document).on("mouseenter", ".table td", function(){
		$(this).parent().find('.btns-opciones').removeClass("hidden");
	}).on("mouseleave", ".table td", function(){
		$(this).parent().find('.btns-opciones').addClass("hidden");
	});

	$(document).on("mouseenter", ".table", function(){
		$(this).find('.btns-nuevo-texto').removeClass("hidden");
	}).on("mouseleave", ".table", function(){
		$(this).find('.btns-nuevo-texto').addClass("hidden");
	});


	$('#mostrar').click(function() {
		if($(this).is(':checked'))  $('#oculto').show();
		else 						$('#oculto').hide();		
	});

});

function confirmarBorrado(){
	var msj = '¿Está seguro que deseas borrarlo?';	
	
	if(confirm(msj)) return true;
	else 			 return false;

}
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


	$(document).on("mouseenter", ".album", function(){
		$(this).find('.btns-opciones-img').removeClass("hidden");
	}).on("mouseleave", ".album", function(){
		$(this).find('.btns-opciones-img').addClass("hidden");
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


	$('.mostrar-avanzado').click(function() {
		$('.mostrar-avanzado-div').hide();		
		$('.mostrar-avanzado-dl').removeClass('hidden');
	});


	$(document).on("mouseenter", ".pre-codigo", function(){
		$(this).append('<buttom class="btn btn-sm btn-default btn-copiar pull-right" onClick="copiarCodigo(this)">Copiar</buttom>');
	}).on("mouseleave", ".pre-codigo", function(){
		$(this).find('.btn-copiar').remove();
	});


});

function confirmarBorrado(){
	var msj = '¿Está seguro que deseas borrarlo?';	
	
	if(confirm(msj)) return true;
	else 			 return false;

}

function copiarCodigo(self){
    var $temp = $("<input>");
    $("body").append($temp);
    var $texto = $(self).parent().clone().children().remove().end().text();
    $temp.val($texto).select();
    document.execCommand("copy");
    $temp.remove();
}
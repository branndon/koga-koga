$(document).ready( function(){
	
	// Slider
	$('.bxslider').bxSlider({
	  infiniteLoop:		true,
	  hideControlOnEnd:	true,
	  auto:				true,
	  pager:			true
	});

	// Google Maps + Listagem de lojas
	$('.listagem a').click( function(e){
		event.preventDefault();
		var clicked = $(this).attr("data-type");

		$('.listagem a').removeClass("active");
		$(this).addClass("active");

		$('.content_maps_lojas .item').addClass("hidden");
		$('.content_maps_lojas #' + clicked).removeClass("hidden");
	});

	// Formulário Newsletter
	$( "#newsletter" ).submit( function() {
		var nome 		= $( "#nome" )[0];
		var email 		= $( "#email" )[0];

		if( nome.value == '' ) {
			alert( 'O campo NOME é obrigatório. Por favor, preencha corretamente.' );
			nome.focus();
			return false;
		}

		if( email.value == '' ) {
			alert( 'O campo EMAIL é obrigatório. Por favor, preencha corretamente.' );
			email.focus();
	
			return false;
		} else if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test( email.value ) ) {
			alert( 'O EMAIL informado não é válido. Por favor, verifique e preencha corretamente.' );
			email.select();
	
			return false;
		}
	});

	// Menu sidebar
		var mySlidebars = new $.slidebars();

		// close
		$('.close-menu').on('click', function() {
			mySlidebars.slidebars.toggle('right');
		});
});
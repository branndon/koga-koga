(function($) {
	$(document).ready(function() {

		var tamanho = 0;
		var espaco = 0;

		$( "nav ul.menu li a" ).each( function( index ) {
			tamanho += $( this ).width();
		} );
		
		espaco = parseInt( ( $( "nav .menu" ).width() - tamanho ) / $( "nav ul.menu li" ).length / 2 );

		$( "nav ul.menu li a" ).css( { 
			"padding-left":		espaco + "px",
			"padding-right":	espaco + "px"
		} );

		$( window ).resize( function() {
			tamanho = 0;

			$( "nav ul.menu li a" ).each( function( index ) {
				tamanho += $( this ).width();
			} );

			espaco = parseInt( ( $( "nav .menu" ).width() - tamanho ) / $( "nav ul.menu li" ).length / 2 );

			$( "nav ul.menu li a" ).css( { 
				"padding-left":		espaco + "px",
				"padding-right":	espaco + "px"
			} );
		} );

		$( "nav ul.menu li ul li a" ).css( { 
			"padding-left":		"10px",
			"padding-right":	"10px"
		} );


		$( "ul.responsivo" ).click( function() {
			$( this ).toggleClass( 'ativo' );
		} );

		$( ".mapa" ).height( $( "main" ).height() )

	});
})(jQuery);
(function($) {
	$(document).ready(function() {

		var invervalo;

		var itens = $( "#carrossel ul li" );

		$( "#carrossel ul" ).width( itens.length * 140 + ( itens.length - 1 ) * parseInt( itens.eq( itens.length - 1 ).css( 'margin-left' ) ) );

		if( $( "#carrossel ul" ).width() <= $( "#carrossel .visivel" ).width() )
			$( "#carrossel .direita" ).hide();
		else
			$( "#carrossel .direita" ).show();

		$( window ).resize( function() {
			if( $( "#carrossel ul" ).width() <= $( "#carrossel .visivel" ).width() )
				$( "#carrossel .direita" ).hide();
			else
				$( "#carrossel .direita" ).show();
		} );

		$( "#carrossel .esquerda" )
			.bind( 'mouseenter', function() {
				invervalo = setInterval( function() {
					if( parseInt( $( "#carrossel ul" ).css( 'margin-left' ) ) < - 1 )
						$( "#carrossel ul" ).finish().animate( { 'margin-left': '+=1px' } );
					else
						$( "#carrossel .esquerda" ).hide();
					$( "#carrossel .direita" ).show();
				}, 1 );
			} )
			.bind( 'mouseleave', function() {
				clearInterval( invervalo );
			} );

		$( "#carrossel .direita" )
			.bind( 'mouseenter', function() {
				invervalo = setInterval( function() {
					if( parseInt( $( "#carrossel ul" ).css( 'margin-left' ) ) > $( "#carrossel" ).width() - $( "#carrossel ul" ).width() + 1 )
						$( "#carrossel ul" ).finish().animate( { 'margin-left': '-=1px' } );
					else
						$( "#carrossel .direita" ).hide();
					$( "#carrossel .esquerda" ).show();
				}, 1 );
			} )
			.bind( 'mouseleave', function() {
				clearInterval( invervalo );
			} );

	});
})(jQuery);
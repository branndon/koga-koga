( function($) {
	$( document ).ready( function() {

		var primeiro = 0;
		var ultimo = $( ".galeria .miniaturas img" ).length - 1;

		var trans = 1000;

		function seguirPosicao( atual ) {
			$( ".galeria .frente ul li" ).css( {
				height: 0,
				width: 0
			} );

			$( ".galeria .frente ul li" ).eq( atual ).animate( {
				height: $( ".galeria .frente ul li" ).eq( atual ).find( "img" ).height(),
				width: $( ".galeria .frente ul li" ).eq( atual ).find( "img" ).width()
			}, trans );
		}

		$( ".galeria .miniaturas img" ).click( function() {
			atual = $( ".galeria .miniaturas img" ).index( this );
			$( ".galeria .fundo" ).fadeIn( trans );

			$( ".galeria .centralizador" ).css( {
				height: $( ".galeria .fundo" ).height(),
				width: $( ".galeria .fundo" ).width()
			} );

			seguirPosicao( atual );
		} );

		$( ".galeria .frente #fechar" ).click( function() {
			$( ".galeria .fundo" ).fadeOut( trans );
		} );

		// $( ".galeria .fundo" ).click( function() {
		// 	$( ".galeria .frente #fechar" ).trigger( "click" );
		// } );

		$(document).keyup( function( e ) {
			if (e.keyCode == 27) // ESC
				$( ".galeria .frente #fechar" ).trigger( "click" );
		} );

		$( ".galeria .frente #esquerda" ).click( function() {
			atual--;
			if( atual < primeiro ) atual = ultimo;
			seguirPosicao( atual );
		} );

		$( ".galeria .frente #direita" ).click( function() {
			atual++;
			if( atual > ultimo ) atual = primeiro;
			seguirPosicao( atual );
		} );

	} );
} ) (jQuery);
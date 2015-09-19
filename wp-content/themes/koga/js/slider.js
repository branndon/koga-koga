(function($) {
	$(document).ready(function() {

		var duracao = 5000;
		var transicao = 500;
		var temporizador;

		var atual = 0;
		var anterior = 0;

		seguirPosicao( anterior, atual );

		function seguirPosicao( anterior, atual ) {
			$( "#slider ul li" ).eq( anterior ).fadeOut( transicao, function() {
				$( "#slider ul li" ).eq( atual ).fadeIn( transicao );
			} );

			clearTimeout( temporizador );
			temporizador = setTimeout( function() { $( "#slider .direita" ).trigger( "click" ); }, duracao );
		}

		$( "#slider .esquerda" ).click( function() {
			anterior = atual;

			if( --atual < 0 )
				atual = $( "#slider ul li" ).length - 1;

			seguirPosicao( anterior, atual );
		} );

		$( "#slider .direita" ).click( function() {
			anterior = atual;

			if( ++atual > $( "#slider ul li" ).length - 1 )
				atual = 0;

			seguirPosicao( anterior, atual );
		} );

	});
})(jQuery);
( function($) {
	$( document ).ready( function() {

		$( "#pesquisa" ).submit( function() {

			var s 		= $( "#s" )[0];
			var b 		= $( "#b" )[0];

			if( s.value == '' && b.value == '0' ) {
				alert( 'Por favor, preencha um dos campos para prosseguir.' );
				s.focus();
		
				return false;
			}

			if( b.value != '0' && s.value == '' )
				s.value = ' ';

		} );

		$( "#contato" ).submit( function(){

			var nome		= $( "#nome" )[0];
			var email		= $( "#email" )[0];
			var telefone	= $( "#telefone" )[0];
			var mensagem	= $( "#mensagem" )[0];

			if( nome.value == '' ) {
				alert( 'O campo NOME é obrigatório. Por favor, preencha corretamente.' );
				nome.focus();
		
				return false;
			}

			if( email.value == '' ) {
				alert( 'O campo EMAIL é obrigatório. Por favor, preencha corretamente.' );
				email.focus();
		
				return false;
			}
			else if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test( email.value ) ) {
				alert( 'O EMAIL informado não é válido. Por favor, verifique e preencha corretamente.' );
				email.select();
		
				return false;
			}

			if( telefone.value == '' || telefone.value.substring( telefone.value.length - 2, telefone.value.length ) == '__' ) {
				alert( 'O campo TELEFONE é obrigatório. Por favor, preencha corretamente.' );
				telefone.focus();
				return false;
			}

			if( mensagem.value == '' ) {
				alert( 'O campo MENSAGEM é obrigatório. Por favor, preencha corretamente.' );
				mensagem.focus();
				return false;
			}

		});

		$( "#newsletter" ).submit( function() {

			var nome 		= $( "#name" )[0];
			var email 		= $( "#mail" )[0];

			if( nome.value == '' ) {
				alert( 'O campo NOME é obrigatório. Por favor, preencha corretamente.' );
				nome.focus();
		
				return false;
			}

			if( email.value == '' ) {
				alert( 'O campo EMAIL é obrigatório. Por favor, preencha corretamente.' );
				email.focus();
		
				return false;
			}
			else if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test( email.value ) ) {
				alert( 'O EMAIL informado não é válido. Por favor, verifique e preencha corretamente.' );
				email.select();
		
				return false;
			}

		} );

		$( "#cadastre" ).submit( function() {

			var nome 		= $( "#nome" )[0];
			var email 		= $( "#email" )[0];
			var telefone	= $( "#telefone" )[0];
			var cidade 		= $( "#cidade" )[0];
			var uf 			= $( "#uf" )[0];

			if( nome.value == '' ) {
				alert( 'O campo NOME é obrigatório. Por favor, preencha corretamente.' );
				nome.focus(); return false;
			}

			if( email.value == '' ) {
				alert( 'O campo EMAIL é obrigatório. Por favor, preencha corretamente.' );
				email.focus(); return false;
			}
			else if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test( email.value ) ) {
				alert( 'O EMAIL informado não é válido. Por favor, verifique e preencha corretamente.' );
				email.select(); return false;
			}

			if( telefone.value == '' ) {
				alert( 'O campo TELEFONE é obrigatório. Por favor, preencha corretamente.' );
				telefone.focus(); return false;
			}

			if( cidade.value == '' ) {
				alert( 'O campo CIDADE é obrigatório. Por favor, preencha corretamente.' );
				cidade.focus(); return false;
			}

			if( uf.value == '0' ) {
				alert( 'O campo UF é obrigatório. Por favor, preencha corretamente.' );
				uf.focus(); return false;
			}

		} );

		$( "#anuncie" ).submit( function() {

			var tipo			= $( 'input[name="tipo"]' )[0];
			var cnpj			= $( 'input[name="cnpj"]' )[0];
			var razao_social	= $( 'input[name="razao_social"]' )[0];
			var nome_fantasia	= $( 'input[name="nome_fantasia"]' )[0];
			var nome_contato	= $( 'input[name="nome_contato"]' )[0];
			var cep				= $( 'input[name="cep"]' )[0];
			var endereco		= $( 'input[name="endereco"]' )[0];
			var numero			= $( 'input[name="numero"]' )[0];
			var bairro			= $( 'input[name="bairro"]' )[0];
			var cidade			= $( 'input[name="cidade"]' )[0];
			var uf				= $( 'select[name="uf"]' )[0];
			var segmento		= $( 'select[name="segmento"]' )[0];
			var telefone1		= $( 'input[name="telefone1"]' )[0];
			var celular			= $( 'input[name="celular"]' )[0];
			var email			= $( 'input[name="email"]' )[0];
			var descricao		= $( 'textarea[name="descricao"]' )[0];
			var autorizacao		= $( 'input[name="autorizacao"]' )[0];

			if( tipo.value == '' ) {
				alert( 'O campo TIPO é obrigatório. Por favor, preencha corretamente.' );
				tipo.focus(); return false;
			}

			if( cnpj.value == '' ) {
				alert( 'O campo CNPJ é obrigatório. Por favor, preencha corretamente.' );
				cnpj.focus(); return false;
			}

			if( razao_social.value == '' ) {
				alert( 'O campo RAZÃO SOCIAL é obrigatório. Por favor, preencha corretamente.' );
				razao_social.focus(); return false;
			}

			if( nome_fantasia.value == '' ) {
				alert( 'O campo NOME FANTASIA é obrigatório. Por favor, preencha corretamente.' );
				nome_fantasia.focus(); return false;
			}

			if( nome_contato.value == '' ) {
				alert( 'O campo NOME DO CONTATO é obrigatório. Por favor, preencha corretamente.' );
				nome_contato.focus(); return false;
			}

			if( cep.value == '' ) {
				alert( 'O campo CEP é obrigatório. Por favor, preencha corretamente.' );
				cep.focus(); return false;
			}

			if( endereco.value == '' ) {
				alert( 'O campo ENDEREÇO é obrigatório. Por favor, preencha corretamente.' );
				endereco.focus(); return false;
			}

			if( numero.value == '' ) {
				alert( 'O campo NÚMERO é obrigatório. Por favor, preencha corretamente.' );
				numero.focus(); return false;
			}

			if( bairro.value == '' ) {
				alert( 'O campo BAIRRO é obrigatório. Por favor, preencha corretamente.' );
				bairro.focus(); return false;
			}

			if( cidade.value == '' ) {
				alert( 'O campo CIDADE é obrigatório. Por favor, preencha corretamente.' );
				cidade.focus(); return false;
			}

			if( uf.value == '0' ) {
				alert( 'O campo UF é obrigatório. Por favor, preencha corretamente.' );
				uf.focus(); return false;
			}

			if( segmento.value == '0' ) {
				alert( 'O campo SEGMENTO é obrigatório. Por favor, preencha corretamente.' );
				segmento.focus(); return false;
			}

			if( telefone1.value == '' ) {
				alert( 'O campo TELEFONE PRINCIPAL é obrigatório. Por favor, preencha corretamente.' );
				telefone1.focus(); return false;
			}

			if( celular.value == '' ) {
				alert( 'O campo CELULAR é obrigatório. Por favor, preencha corretamente.' );
				celular.focus(); return false;
			}

			if( email.value == '' ) {
				alert( 'O campo EMAIL é obrigatório. Por favor, preencha corretamente.' );
				email.focus(); return false;
			}
			else if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test( email.value ) ) {
				alert( 'O EMAIL informado não é válido. Por favor, verifique e preencha corretamente.' );
				email.select(); return false;
			}

			if( descricao.value == '' ) {
				alert( 'O campo DESCRIÇÃO é obrigatório. Por favor, preencha corretamente.' );
				descricao.focus(); return false;
			}

			if( !autorizacao.checked ) {
				alert( 'O campo AUTORIZAÇÃO é obrigatório. Por favor, preencha corretamente.' );
				autorizacao.focus(); return false;
			}

		} );

		$( '#anuncie input[name="tipo"]' ).change( function() {
			$( "#anuncie #exemplo .bloco" ).hide();
			$( "#anuncie #exemplo .exemplo-" + $( this )[0].value ).show();

			if( $( this )[0].value == 'Pago' )
				$( "#anuncie h3.preco" ).text( "R$300,00 / semestre" );
			else
				$( "#anuncie h3.preco" ).text( "Grátis" );
		} );

		$( '#anuncie select[name="segmento"]' ).change( function() {
			if( $( this )[0].value == 'Outro' )
				alert( 'Caso seu segmento não esteja listado, apresente-o no campo Descrição' );
		} );
		
	} );
} ) (jQuery);
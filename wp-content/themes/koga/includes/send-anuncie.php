<?php

	$tipo			= strip_tags( trim( $_POST[ 'tipo' ] ) );
	$delivery		= strip_tags( trim( $_POST[ 'delivery' ] ) );
	$cnpj			= strip_tags( trim( $_POST[ 'cnpj' ] ) );
	$razao_social	= strip_tags( trim( $_POST[ 'razao_social' ] ) );
	$nome_fantasia	= strip_tags( trim( $_POST[ 'nome_fantasia' ] ) );
	$nome_contato	= strip_tags( trim( $_POST[ 'nome_contato' ] ) );
	$cep			= strip_tags( trim( $_POST[ 'cep' ] ) );
	$endereco		= strip_tags( trim( $_POST[ 'endereco' ] ) );
	$numero			= strip_tags( trim( $_POST[ 'numero' ] ) );
	$complemento	= strip_tags( trim( $_POST[ 'complemento' ] ) );
	$bairro			= strip_tags( trim( $_POST[ 'bairro' ] ) );
	$cidade			= strip_tags( trim( $_POST[ 'cidade' ] ) );
	$uf				= strip_tags( trim( $_POST[ 'uf' ] ) );
	$segmento		= strip_tags( trim( $_POST[ 'segmento' ] ) );
	$telefone1		= strip_tags( trim( $_POST[ 'telefone1' ] ) );
	$telefone2		= strip_tags( trim( $_POST[ 'telefone2' ] ) );
	$celular		= strip_tags( trim( $_POST[ 'celular' ] ) );
	$fax			= strip_tags( trim( $_POST[ 'fax' ] ) );
	$email			= strip_tags( trim( $_POST[ 'email' ] ) );
	$website		= strip_tags( trim( $_POST[ 'website' ] ) );
	$facebook		= strip_tags( trim( $_POST[ 'facebook' ] ) );
	$twitter		= strip_tags( trim( $_POST[ 'twitter' ] ) );
	$youtube		= strip_tags( trim( $_POST[ 'youtube' ] ) );
	$video_destaque	= strip_tags( trim( $_POST[ 'video_destaque' ] ) );
	$descricao		= strip_tags( trim( $_POST[ 'descricao' ] ) );
	$cartao			= $_POST[ 'cartao' ];
	$preco_minimo	= strip_tags( trim( $_POST[ 'preco_minimo' ] ) );
	$preco_maximo	= strip_tags( trim( $_POST[ 'preco_maximo' ] ) );
	$estacionamento	= strip_tags( trim( $_POST[ 'estacionamento' ] ) );
	$arcondicionado	= strip_tags( trim( $_POST[ 'arcondicionado' ] ) );
	$dom_abre		= strip_tags( trim( $_POST[ 'dom_abre' ] ) );
	$dom_fecha		= strip_tags( trim( $_POST[ 'dom_fecha' ] ) );
	$seg_abre		= strip_tags( trim( $_POST[ 'seg_abre' ] ) );
	$seg_fecha		= strip_tags( trim( $_POST[ 'seg_fecha' ] ) );
	$ter_abre		= strip_tags( trim( $_POST[ 'ter_abre' ] ) );
	$ter_fecha		= strip_tags( trim( $_POST[ 'ter_fecha' ] ) );
	$qua_abre		= strip_tags( trim( $_POST[ 'qua_abre' ] ) );
	$qua_fecha		= strip_tags( trim( $_POST[ 'qua_fecha' ] ) );
	$qui_abre		= strip_tags( trim( $_POST[ 'qui_abre' ] ) );
	$qui_fecha		= strip_tags( trim( $_POST[ 'qui_fecha' ] ) );
	$sex_abre		= strip_tags( trim( $_POST[ 'sex_abre' ] ) );
	$sex_fecha		= strip_tags( trim( $_POST[ 'sex_fecha' ] ) );
	$sab_abre		= strip_tags( trim( $_POST[ 'sab_abre' ] ) );
	$sab_fecha		= strip_tags( trim( $_POST[ 'sab_fecha' ] ) );
	$newsletter		= strip_tags( trim( $_POST[ 'newsletter' ] ) );
	$autorizacao	= strip_tags( trim( $_POST[ 'autorizacao' ] ) );

	if(
		empty( $tipo ) ||
		empty( $cnpj ) ||
		empty( $razao_social ) ||
		empty( $nome_fantasia ) ||
		empty( $nome_contato ) ||
		empty( $cep ) ||
		empty( $endereco ) ||
		empty( $numero ) ||
		empty( $bairro ) ||
		empty( $cidade ) ||
		empty( $uf ) ||
		empty( $segmento ) ||
		empty( $telefone1 ) ||
		empty( $celular ) ||
		empty( $email ) ||
		empty( $descricao ) ||
		empty( $autorizacao )
	) {
		echo '<script> alert( "Alguns campos são obrigatórios. Por favor, tente novamente." ); history.go(-1); </script>';
		return false;
	}

	else {

		date_default_timezone_set( 'America/Sao_Paulo' );
		$data 	  = date( 'd/m/Y' );
		$hora 	  = date( 'H:i:s' );

		require( 'PHPMailer/class.phpmailer.php' );
		$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host 	= 'mail.agenciacoletiva.com.br';
		$mail->Port     = '587';
		$mail->Username = 'coletiva@agenciacoletiva.com.br';
		$mail->Password = '123456';

		$mail->From 	= $email; 
		$mail->FromName = $nome_fantasia;

		$mail->AddAddress( 'gabriel@coletivaweb.com.br' );
		//$mail->AddCC( '' );
		//$mail->AddBCC( 'antonio@coletivaweb.com.br' );

		$mail->IsHTML( true ); 
		$mail->CharSet 	= 'UTF-8';

		$mail->Subject  = 'Anúncio - Discovery Website';

		$cartoes = '';

		for( $k = 0; $k < count( $cartao ); $k++ ) {
			if( ( $k + 1 ) == count( $cartao ) && ( $k > 0 ) )
				$cartoes .= ' e ';
			else if( $k > 0 )
				$cartoes .= ', ';
			$cartoes .= $cartao[$k];
		}

		$mail->Body 	= '
			<table border="0" style="border: 0; font-family: Tahoma; font-size: 13px; padding: 0 3px 3px 0;">
				<tr><td>Tipo:</td>				<td>' . $tipo . '</td></tr>
				<tr><td>Delivery:</td>			<td>' . $delivery . '</td></tr>
				<tr><td>CNPJ:</td>				<td>' . $cnpj . '</td></tr>
				<tr><td>Razão social:</td>		<td>' . $razao_social . '</td></tr>
				<tr><td>Nome fantasia:</td>		<td>' . $nome_fantasia . '</td></tr>
				<tr><td>Nome do contato:</td>	<td>' . $nome_contato . '</td></tr>
				<tr><td>CEP:</td>				<td>' . $cep . '</td></tr>
				<tr><td>Endereço:</td>			<td>' . $endereco . '</td></tr>
				<tr><td>Número:</td>			<td>' . $numero . '</td></tr>
				<tr><td>Complemento:</td>		<td>' . $complemento . '</td></tr>
				<tr><td>Bairro:</td>			<td>' . $bairro . '</td></tr>
				<tr><td>Cidade:</td>			<td>' . $cidade . '</td></tr>
				<tr><td>UF:</td>				<td>' . $uf . '</td></tr>
				<tr><td>Segmento:</td>			<td>' . $segmento . '</td></tr>
				<tr><td>Tel. principal:</td>	<td>' . $telefone1 . '</td></tr>
				<tr><td>Tel. secundário:</td>	<td>' . $telefone2 . '</td></tr>
				<tr><td>Celular:</td>			<td>' . $celular . '</td></tr>
				<tr><td>Fax:</td>				<td>' . $fax . '</td></tr>
				<tr><td>E-mail:</td>			<td>' . $email . '</td></tr>
				<tr><td>Website:</td>			<td>' . $website . '</td></tr>
				<tr><td>Facebook:</td>			<td>' . $facebook . '</td></tr>
				<tr><td>Twitter:</td>			<td>' . $twitter . '</td></tr>
				<tr><td>YouTube:</td>			<td>' . $youtube . '</td></tr>
				<tr><td>Vídeo em destaque:</td>	<td>' . $video_destaque . '</td></tr>
				<tr><td>Descrição:</td>			<td>' . $descricao . '</td></tr>
				<tr><td>Cartão:</td>			<td>' . $cartoes . '</td></tr>
				<tr><td>Preço mínimo:</td>		<td>' . $preco_minimo . '</td></tr>
				<tr><td>Preço máximo:</td>		<td>' . $preco_maximo . '</td></tr>
				<tr><td>Estacionamento:</td>	<td>' . $estacionamento . '</td></tr>
				<tr><td>Ar-condicionado:</td>	<td>' . $arcondicionado . '</td></tr>
				<tr><td>Dom - Abertura:</td>	<td>' . $dom_abre . '</td></tr>
				<tr><td>Dom - Fechamento:</td>	<td>' . $dom_fecha . '</td></tr>
				<tr><td>Seg - Abertura:</td>	<td>' . $seg_abre . '</td></tr>
				<tr><td>Seg - Fechamento:</td>	<td>' . $seg_fecha . '</td></tr>
				<tr><td>Ter - Abertura:</td>	<td>' . $ter_abre . '</td></tr>
				<tr><td>Ter - Fechamento:</td>	<td>' . $ter_fecha . '</td></tr>
				<tr><td>Qua - Abertura:</td>	<td>' . $qua_abre . '</td></tr>
				<tr><td>Qua - Fechamento:</td>	<td>' . $qua_fecha . '</td></tr>
				<tr><td>Qui - Abertura:</td>	<td>' . $qui_abre . '</td></tr>
				<tr><td>Qui - Fechamento:</td>	<td>' . $qui_fecha . '</td></tr>
				<tr><td>Sex - Abertura:</td>	<td>' . $sex_abre . '</td></tr>
				<tr><td>Sex - Fechamento:</td>	<td>' . $sex_fecha . '</td></tr>
				<tr><td>Sab - Abertura:</td>	<td>' . $sab_abre . '</td></tr>
				<tr><td>Sab - Fechamento:</td>	<td>' . $sab_fecha . '</td></tr>
				<tr><td>Newsletter:</td>		<td>' . $newsletter . '</td></tr>
				<tr><td>Aut. veinculação:</td>	<td>' . $autorizacao . '</td></tr>
			</table>
			<hr /><span style="font-size: 12px;">Mensagem enviada em ' . $data . ', às ' . $hora . ', via ' . $_SERVER[ 'HTTP_REFERER' ] . '</span>
		';

		$conexao = mysqli_connect( 'localhost', 'agenciac_dtur', 'Rutg$~ism0xaC&^_e0z', 'agenciac_dturismo' ) or die( 'Error ' . mysqli_error( $conexao ) );

		mysqli_query( $conexao, "
			INSERT INTO form_anuncie (
				tipo,
				delivery,
				cnpj,
				razao_social,
				nome_fantasia,
				nome_contato,
				cep,
				endereco,
				numero,
				complemento,
				bairro,
				cidade,
				uf,
				segmento,
				telefone1,
				telefone2,
				celular,
				fax,
				email,
				website,
				facebook,
				twitter,
				youtube,
				video_destaque,
				descricao,
				cartoes,
				preco_minimo,
				preco_maximo,
				estacionamento,
				arcondicionado,
				dom_abre,
				dom_fecha,
				seg_abre,
				seg_fecha,
				ter_abre,
				ter_fecha,
				qua_abre,
				qua_fecha,
				qui_abre,
				qui_fecha,
				sex_abre,
				sex_fecha,
				sab_abre,
				sab_fecha,
				newsletter,
				autorizacao,
				data
			)
			VALUES (
				'" . utf8_decode( $tipo ) . "',
				'" . utf8_decode( $delivery ) . "',
				'" . utf8_decode( $cnpj ) . "',
				'" . utf8_decode( $razao_social ) . "',
				'" . utf8_decode( $nome_fantasia ) . "',
				'" . utf8_decode( $nome_contato ) . "',
				'" . utf8_decode( $cep ) . "',
				'" . utf8_decode( $endereco ) . "',
				'" . utf8_decode( $numero ) . "',
				'" . utf8_decode( $complemento ) . "',
				'" . utf8_decode( $bairro ) . "',
				'" . utf8_decode( $cidade ) . "',
				'" . utf8_decode( $uf ) . "',
				'" . utf8_decode( $segmento ) . "',
				'" . utf8_decode( $telefone1 ) . "',
				'" . utf8_decode( $telefone2 ) . "',
				'" . utf8_decode( $celular ) . "',
				'" . utf8_decode( $fax ) . "',
				'" . utf8_decode( $email ) . "',
				'" . utf8_decode( $website ) . "',
				'" . utf8_decode( $facebook ) . "',
				'" . utf8_decode( $twitter ) . "',
				'" . utf8_decode( $youtube ) . "',
				'" . utf8_decode( $video_destaque ) . "',
				'" . utf8_decode( $descricao ) . "',
				'" . utf8_decode( $cartoes ) . "',
				'" . utf8_decode( $preco_minimo ) . "',
				'" . utf8_decode( $preco_maximo ) . "',
				'" . utf8_decode( $estacionamento ) . "',
				'" . utf8_decode( $arcondicionado ) . "',
				'" . utf8_decode( $dom_abre ) . "',
				'" . utf8_decode( $dom_fecha ) . "',
				'" . utf8_decode( $seg_abre ) . "',
				'" . utf8_decode( $seg_fecha ) . "',
				'" . utf8_decode( $ter_abre ) . "',
				'" . utf8_decode( $ter_fecha ) . "',
				'" . utf8_decode( $qua_abre ) . "',
				'" . utf8_decode( $qua_fecha ) . "',
				'" . utf8_decode( $qui_abre ) . "',
				'" . utf8_decode( $qui_fecha ) . "',
				'" . utf8_decode( $sex_abre ) . "',
				'" . utf8_decode( $sex_fecha ) . "',
				'" . utf8_decode( $sab_abre ) . "',
				'" . utf8_decode( $sab_fecha ) . "',
				'" . utf8_decode( $newsletter ) . "',
				'" . utf8_decode( $autorizacao ) . "',
				'" . date( "Y-m-d H:i:s" ) . "'
			)
		" );

		if( $newsletter != '' )
			mysqli_query( $conexao, "
				INSERT INTO form_newsletter (
					nome,
					email,
					data
				)
				VALUES (
					'" . utf8_decode( $nome_contato ) . "',
					'" . utf8_decode( $email ) . "',
					'" . date( "Y-m-d H:i:s" ) . "'
				)
			" );

		mysqli_close( $conexao );

		$enviado = $mail->Send();

		if ( $enviado ) { echo '<script> top.location.href = "../resposta-anuncie/"; </script>'; }
		else { echo '<script> alert( "Houve um erro no envio. Por favor, tente novamente" ); history.go( -1 ); </script>'; }
	}

?>
<?php

	if( isset( $_POST[ 'btn-contato' ] ) ) {

		$nome			= strip_tags( trim( $_POST[ 'nome' ] ) );
		$email			= strip_tags( trim( $_POST[ 'email' ] ) );
		$telefone		= strip_tags( trim( $_POST[ 'telefone' ] ) );
		$mensagem		= strip_tags( trim( $_POST[ 'mensagem' ] ) );

		if(
			empty( $nome ) ||
			empty( $email ) ||
			empty( $telefone ) ||
			empty( $mensagem )
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
			$mail->FromName = $nome;

			$mail->AddAddress( 'gabriel@coletivaweb.com.br' );
			//$mail->AddCC( '' );
			//$mail->AddBCC( 'antonio@coletivaweb.com.br' );

			$mail->IsHTML( true ); 
			$mail->CharSet 	= 'UTF-8';

			$mail->Subject  = 'Contato - Discovery Website';

			$mail->Body 	= '
				<table border="0" style="border: 0; font-family: Tahoma; font-size: 13px; padding: 0 3px 3px 0;">
					<tr><td>Nome:</td>				<td>' . $nome . '</td></tr>
					<tr><td>E-mail:</td>			<td>' . $email . '</td></tr>
					<tr><td>Telefone:</td>			<td>' . $telefone . '</td></tr>
					<tr><td>Mensagem:</td>			<td>' . $mensagem . '</td></tr>
				</table>
				<hr /><span style="font-size: 12px;">Mensagem enviada em ' . $data . ', às ' . $hora . ', via ' . $_SERVER[ 'HTTP_REFERER' ] . '</span>
			';

			$conexao = mysqli_connect( 'localhost', 'agenciac_dtur', 'Rutg$~ism0xaC&^_e0z', 'agenciac_dturismo' ) or die( 'Error ' . mysqli_error( $conexao ) );

			mysqli_query( $conexao, "
				INSERT INTO form_contato (
					nome,
					email,
					telefone,
					mensagem,
					data
				)
				VALUES (
					'" . utf8_decode( $nome ) . "',
					'" . utf8_decode( $email ) . "',
					'" . utf8_decode( $telefone ) . "',
					'" . utf8_decode( $mensagem ) . "',
					'" . date( "Y-m-d H:i:s" ) . "'
				)
			" );

			mysqli_close( $conexao );

			$enviado = $mail->Send();

			if ( $enviado ) { echo '<script> top.location.href = "../../../../resposta-contato/"; </script>'; }
			else { echo '<script> alert( "Houve um erro no envio. Por favor, tente novamente" ); history.go( -1 ); </script>'; }
		}
	}

	else { echo '<script> alert( "Houve um erro no preenchimento. Por favor, tente novamente" ); history.go( -1 ); </script>'; }

?>
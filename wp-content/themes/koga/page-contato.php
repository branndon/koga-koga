<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

// Template Name: Contato

get_header(); ?>
<section>

	<div class="palco colunas-06">
		<article>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			
			<form name="contato" id="contato" method="post" action="<?php bloginfo( 'template_directory' ); ?>/includes/send-contato.php">

				<div class="bloco">
					<div class="linha">
						<div class="dado grid colunas-12">
							<label for="nome">Nome</label>
							<div class="campo"><input type="text" name="nome" id="nome" placeholder="Obrigatório" /></div>
						</div>
					</div>
					<div class="linha">
						<div class="dado grid colunas-08">
							<label for="email">E-mail</label>
							<div class="campo"><input type="text" name="email" id="email" placeholder="Obrigatório" /></div>
						</div>
						<div class="dado grid colunas-04">
							<label for="telefone">Telefone</label>
							<div class="campo"><input type="text" name="telefone" id="telefone" placeholder="Obrigatório" /></div>
						</div>
					</div>
					<div class="linha">
						<div class="dado grid colunas-12">
							<label for="mensagem">Mensagem</label>
							<div class="campo"><textarea name="mensagem" id="mensagem" placeholder="Obrigatório"></textarea></div>
						</div>
					</div>
				</div>

				<div class="bloco">
					<div class="linha">
						<div class="dado">
							<input type="submit" id="btn-contato" name="btn-contato" value="Enviar" />
						</div>
					</div>
				</div>

			</form>

		</article>
	</div>

	<div class="palco colunas-06">
		<div class="mapa">
			<?php
				echo '
					<iframe frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcn2yj6--5m7bo6VH4HKVzZoAxl83AIsA&q=' .
						get_option( 'endereco' ) . '%20' .
						get_option( 'numero' ) . '%20' .
						get_option( 'bairro' ) . '%20' .
						get_option( 'cidade' ) . '%20' .
						get_option( 'estado' ) .
					'"></iframe>
				';
			?>
		</div>
	</div>
	
</section>
<?php get_footer(); ?>
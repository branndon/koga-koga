<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

get_header(); ?>
<section>

	<div class="palco colunas-08">
		<article>
			<h1>Página não encontrada</h1>
			<p>O conteúdo que você buscou não pôde ser encontrado.</p>
			<p>Talvez você encontre algo semelhante aqui:</p>
			<?php mapa_do_site(); ?>
		</article>
	</div>

	<div class="palco colunas-04">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>

</section>
<?php get_footer(); ?>
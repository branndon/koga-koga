<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

get_header(); ?>
<section>

	<div class="palco colunas-08">
		<article>
			<?php
				echo '<h1>' . get_the_title() . '</h1>';
				
				if ( has_post_thumbnail() )
					the_post_thumbnail( 'thumbG', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'aligncenter capa' ) );

				the_content();

				if( get_post_meta( get_the_ID(), '_galeria', true ) == 'on' )
					listar_galeria( get_the_ID() );

				if( get_post_meta( get_the_ID(), '_comentario', true ) == 'on' )
					echo '
						<div class="comentarios">
							<div class="fb-comments" data-width="610" data-href="' . get_bloginfo( 'url' ) . '" data-numposts="5" data-colorscheme="light"></div>
						</div>
					';
			?>
		</article>
	</div>

</section>
<?php get_footer(); ?>
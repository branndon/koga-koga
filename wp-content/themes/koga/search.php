<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

get_header(); ?>
<section>

	<div class="palco colunas-08">
		<article>

			<h1>Resultados para: <?php echo get_search_query(); ?></h1>

			<?php if( category_description() ) { ?>
				<p><?php echo category_description(); ?></p>
			<?php } ?>

			<?php if( have_posts() ) { ?>
				<div class="lista">
					<?php
						while( have_posts() ) {

							the_post();

							echo '<div class="bloco limpo">';

								echo '<a href="' . get_permalink() . '" class="capa">';
									if( has_post_thumbnail() )
										echo get_the_post_thumbnail( get_the_ID(), 'thumbM', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
									else
										echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/img-thumbM.jpg" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
								echo '</a>';

								echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
								echo '<p>' . wp_html_excerpt( wp_strip_all_tags( get_the_content() ), 150, '...' ) . '</p>';
								echo '<a href="' . get_permalink() . '" class="saibamais">+</a>';

							echo '</div>';

						}
					?>
				</div>
				<?php get_template_part( 'pagination' ); ?>

			<?php } else { ?>
				<h2>Essa categoria não possui posts</h2>
			<?php } ?>

		</article>
	</div>

	<div class="palco colunas-04">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>

	<figure></figure>

</section>
<?php get_footer(); ?>
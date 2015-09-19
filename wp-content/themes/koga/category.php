<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

get_header(); ?>
<section>

	<div class="palco colunas-8">
		<article>

			<h1><?php single_cat_title(); ?></h1>
			<p id="quantidade">Resultados: <span><?php echo $wp_query->found_posts ?></span></p>

			<?php if ( category_description() ) { ?>
				<p><?php echo category_description(); ?></p>
			<?php } ?>

			<?php if ( have_posts() ) { ?>
				<div class="lista">
					<?php while ( have_posts() ) { the_post(); ?>
						<div class="bloco limpo" <?php post_class(); ?>>

							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>">
			  						<?php echo get_the_post_thumbnail( $post->ID, 'thumbM', 'alt=' . get_the_title() . '&title=' . get_the_title() . '&class=capa' ); ?>
			  					</a>
		  					<?php } else { ?>
								<a href="<?php the_permalink(); ?>">
		  							<img src="<?php bloginfo( 'template_directory'); ?>/images/img-thumbM.jpg" alt="<?php get_the_title(); ?>" title="<?php get_the_title(); ?>" class="capa" />
		  						</a>
		  					<?php } ?>
							
							<div class="detalhes limpo">
								<div class="texto limpo">

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									<div class="separador limpo"><a class="mais" href="<?php the_permalink(); ?>">Mais</a></div>

									<div class="endereco">
										<p><?php echo wp_html_excerpt( wp_strip_all_tags( get_the_content() ), 250, '...' ); ?></p>
									</div>

								</div>
							</div>

						</div>
					<?php } ?>
					<figure></figure>
				</div>

				<?php get_template_part( 'pagination' ); ?>

			<?php } else { ?>
				<h2>Essa categoria não possui posts</h2>
			<?php } ?>
		</article>
	</div>

	<div class="palco colunas-4">
		<aside>
			<div class="widget limpo">
				<a href="http://www.coletivaweb.com.br/" target="_blank" rel="nofollow">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/bannerM.jpg" title="ColetivaWeb">
				</a>
			</div>
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside>
	</div>

	<figure></figure>

</section>
<?php get_footer(); ?>
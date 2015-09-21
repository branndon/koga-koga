<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

get_header(); ?>
<section>
	
	<article>
		<div class="line content-tit">
			<div class="tit-page grid colunas-06 item">
				<h1 class="rubrik"><?php the_title(); ?></h1>
			</div>
			<div class="grid colunas-06 item">
				<img src="<?php bloginfo( 'template_directory'); ?>/images/servicos/encontre-o-servivo-mais-rapido.png" alt="" />
				<div class="search">
					<!-- search form -->
				</div>
			</div>
		</div>

		<figure></figure>

		<div class="line">
			<div class="grid colunas-06 item">
				<div class="description">
					<?php  while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="grid colunas-06 item">
				
			</div>
		</div>

		<figure></figure>

	</article>
	
</section>
<?php get_footer(); ?>













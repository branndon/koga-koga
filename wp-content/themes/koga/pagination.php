<div id="pagination" class="limpo">
	<?php
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base'		=> str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'	=> '?paged=%#%',
			'current'	=> max( 1, get_query_var( 'paged' ) ),
			'total'		=> $wp_query->max_num_pages,
			'prev_text'	=> '‹',
			'next_text'	=> '›'
		 ));
	?>
	<figure></figure>
</div>
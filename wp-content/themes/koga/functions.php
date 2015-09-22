<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/

add_filter('show_admin_bar', '__return_false');

/* Páginas de administração */

function crirar_menu_personalizacoes() {
	add_menu_page(
		'Personalização do site',
		'Personalizações',
		'manage_options',
		'menu_personalizacao',
		'configurar_pagina_personalizacoes',
		'',
		61
	);
}
add_action( 'admin_menu', 'crirar_menu_personalizacoes' );

function criar_submenu_midiassociais() {
	add_submenu_page( 
		'menu_personalizacao',
		'Configurações de mídias sociais',
		'Mídias sociais',
		'manage_options',
		'midias-sociais',
		'configurar_pagina_midiassociais'
	);
}
add_action('admin_menu', 'criar_submenu_midiassociais');

function registrar_opcoes() {
	register_setting( 'personalizacao', 'endereco' );
	register_setting( 'personalizacao', 'numero' );
	register_setting( 'personalizacao', 'bairro' );
	register_setting( 'personalizacao', 'cidade' );
	register_setting( 'personalizacao', 'estado' );
	register_setting( 'personalizacao', 'cep' );
	register_setting( 'personalizacao', 'telefone' );
	register_setting( 'personalizacao', 'email' );
	register_setting( 'midias_sociais', 'facebook' );
	register_setting( 'midias_sociais', 'twitter' );
	register_setting( 'midias_sociais', 'youtube' );
}
add_action( 'admin_init', 'registrar_opcoes' );

function configurar_pagina_personalizacoes(){
	echo '<h2>Personalização do site</h2>';
	echo '<form method="post" action="options.php">';
		settings_fields( 'personalizacao' );
		do_settings_sections( 'personalizacao' );
		echo '<table>';
			echo '<tr>';
				echo '<td><label for="endereco">Endereço</label></td>';
				echo '<td><input type="text" name="endereco" id="endereco" value="' . get_option( 'endereco' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="numero">Número</label></td>';
				echo '<td><input type="text" name="numero" id="numero" value="' . get_option( 'numero' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="bairro">Bairro</label></td>';
				echo '<td><input type="text" name="bairro" id="bairro" value="' . get_option( 'bairro' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="cidade">Cidade</label></td>';
				echo '<td><input type="text" name="cidade" id="cidade" value="' . get_option( 'cidade' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="estado">Estado</label></td>';
				echo '<td><input type="text" name="estado" id="estado" value="' . get_option( 'estado' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="telefone">Telefone</label></td>';
				echo '<td><input type="text" name="telefone" id="telefone" value="' . get_option( 'telefone' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="email">E-mail</label></td>';
				echo '<td><input type="text" name="email" id="email" value="' . get_option( 'email' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="cep">CEP</label></td>';
				echo '<td><input type="text" name="cep" id="cep" value="' . get_option( 'cep' ) . '" /></td>';
			echo '</tr>';
		echo '</table>';
		submit_button();
	echo '</form>';
}

function configurar_pagina_midiassociais(){
	echo '<h2>Configurações de mídias sociais</h2>';
	echo '<form method="post" action="options.php">';
		settings_fields( 'midias_sociais' );
		do_settings_sections( 'midias_sociais' );
		echo '<table>';
			echo '<tr>';
				echo '<td><label for="facebook">Facebook</label></td>';
				echo '<td><input type="text" name="facebook" id="facebook" value="' . get_option( 'facebook' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="twitter">Twitter</label></td>';
				echo '<td><input type="text" name="twitter" id="twitter" value="' . get_option( 'twitter' ) . '" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><label for="youtube">YouTube</label></td>';
				echo '<td><input type="text" name="youtube" id="youtube" value="' . get_option( 'youtube' ) . '" /></td>';
			echo '</tr>';
		echo '</table>';
		submit_button();
	echo '</form>';
}

/* Widgets */

register_sidebar( array(
	'name'			=> __( 'Sidebar', 'sidebar' ),
	'id'			=> 'sidebar',
	'description'	=> 'Anúncios da barra lateral',
	'class' 		=> '',
	'before_widget'	=> '<aside id="%1$s" class="widget %2$s limpo">',
	'after_widget'	=> '</aside>',
	'before_title'	=> '<h3>',
	'after_title'	=> '</h3>'
) );

/* Colunas de administração */

function novas_colunas_produto( $colunas ) {
	$colunas['thumb'] = 'Miniatura';
	return $colunas;
}
add_filter( 'manage_produto_posts_columns', 'novas_colunas_produto' );

function gerencia_colunas_produto( $nome, $id ) {
	switch( $nome ) {
		case 'thumb':
			if( has_post_thumbnail( $id ) )
				echo get_the_post_thumbnail( $id, array( 32, 32 ) );
			else
				echo '—';
			break;
		default:
			break;
	}
}
add_action( 'manage_produto_posts_custom_column', 'gerencia_colunas_produto', 10, 2 );

/* Menus */

register_nav_menu( 'principal', 'Menu principal' );
register_nav_menu( 'auxiliar', 'Menu auxiliar' );

/* Remove itens do menu admin */

function remove_menus() {
	global $menu;

	$restricted = array( __('Comments') );

	if( get_current_user_id() > 1 ) {
		$restricted[] = __( 'Settings' );
		$restricted[] = __( 'Plugins' );
		$restricted[] = __( 'Editor' );
		$restricted[] = __( 'Tools' );
		remove_menu_page( 'wpseo_dashboard' );
	}
	
	end( $menu );

	while ( prev( $menu ) ) {
		$value = explode( ' ', $menu[key( $menu )][0] );
		if( in_array( $value[0] != NULL?$value[0] : "" , $restricted ) ) { unset( $menu[key( $menu )] ); }
	}
}
add_action( 'admin_menu', 'remove_menus' );

function remove_submenus() {
	if( get_current_user_id() > 1 ) {
		remove_submenu_page( 'index.php', 'update-core.php' );
		remove_submenu_page( 'themes.php', 'themes.php' );
		remove_submenu_page( 'themes.php', 'customize.php' );
		remove_submenu_page( 'users.php', 'users.php' );
		remove_submenu_page( 'users.php', 'user-new.php' );
		define( 'DISALLOW_FILE_EDIT', true );
	}
}
add_action( 'admin_menu', 'remove_submenus' );

function remove_itens_topo() {
	global $wp_admin_bar;

	if( get_current_user_id() > 1 ) {
		$wp_admin_bar->remove_menu( 'wpseo-menu' );
		$wp_admin_bar->remove_menu( 'customize' );
		$wp_admin_bar->remove_menu( 'new-user' );
		$wp_admin_bar->remove_menu( 'updates' );
		$wp_admin_bar->remove_menu( 'themes' );
	}
}
add_action( 'wp_before_admin_bar_render', 'remove_itens_topo' );

/* Configurações de thumbnails */

add_theme_support( 'post-thumbnails' );
add_image_size( 'sliderP',	650,	375,	true	);
add_image_size( 'sliderG',	990,	375,	true	);
add_image_size( 'galeria',	800,	600,	false	);
add_image_size( 'thumbP',	 85,	 85,	true	);
add_image_size( 'thumbM',	140,	105,	true	);
add_image_size( 'thumbG',	310,	232,	true	);

/* Shortcodes */

function bloginfo_short( $atts ) {
	extract( shortcode_atts( array(
		'get' => 'name',
	), $atts ) );

	return get_bloginfo( "{$get}" );
}
add_shortcode( 'bloginfo', 'bloginfo_short' );

function url_short( $atts ) {
	extract( shortcode_atts( array(
		'get' => 0,
	), $atts ) );

	return get_permalink( "{$get}" );
}
add_shortcode( 'url', 'url_short' );

function mapa_short() {
	return mapa_do_site();
}
add_shortcode( 'mapa', 'mapa_short' );

function form_sidebar_short() {
	return mostrar_form_sidebar();
}
add_shortcode( 'sideform', 'form_sidebar_short' );

function mostra_captcha_short() {
	return mostra_captcha( false );
}
add_shortcode( 'captcha', 'mostra_captcha_short' );

/* Ativar shortcodes em widgets */

add_filter( 'widget_text', 'do_shortcode' );

/* Definições de paginação */

// function altera_loops( $query ){
// 	if ( $query->is_main_query() && ( is_tax( 'setor' ) || $query->is_search() ) && !is_admin() ) {
// 		$query->set( 'meta_key', 'tipo' );
// 		$query->set( 'orderby', 'meta_value' );
// 		$query->set( 'order', 'desc' );
// 	}

// 	if( $query->is_search() && !is_admin() ) {

// 		$query->set( 'post_type', 'anunciante' );

// 		$parametros = array(
// 			'relation'			=> 'AND'
// 		);

// 		if( $_GET['b'] != '0' ) {
// 			array_push( $parametros,
// 				array(
// 					'key'		=> 'bairro',
// 					'value'		=> $_GET['b']
// 				)
// 			);
// 		}

// 		global $wpdb;

// 		$resultados = $wpdb->get_results( "
// 			SELECT DISTINCT post_id
// 			FROM $wpdb->postmeta AS meta
// 			INNER JOIN $wpdb->term_relationships AS relacao
// 			ON meta.post_id = relacao.object_id
// 			INNER JOIN $wpdb->terms as taxonomia
// 			ON relacao.term_taxonomy_id = taxonomia.term_id
// 			WHERE
// 				(
// 					meta.meta_value LIKE '%" . $_GET['s'] . "%'
// 					AND (
// 						meta.meta_key = 'cidade' OR
// 						meta.meta_key = 'bairro' OR
// 						meta.meta_key = 'endereco' OR
// 						meta.meta_key = 'nome-fantasia'
// 					)
// 				)
// 				OR
// 				(
// 					taxonomia.name LIKE '%" . $_GET['s'] . "%'
// 				)
// 			ORDER BY meta_value
// 		" );

// 		$ids = array();

// 		foreach( $resultados as $resultado )
// 			array_push( $ids, $resultado->post_id );
		
// 		if( sizeof( $ids ) == 0 )
// 			$ids = array( 0 );

// 		$query->set( 's', '' );
// 		$query->set( 'meta_query', $parametros );
// 		$query->set( 'post__in', $ids );

// 	}

// 	return $query;
// }
// add_filter( 'pre_get_posts', 'altera_loops' );

/* Post types */



/* Relaciona Post types e Taxonomias */

function relaciona_type_taxonomia() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'relaciona_type_taxonomia', 500 );

/* Campos personalizados */

function gera_formulario( $meta_dados ) {  
	global $post;  

	echo '<input type="hidden" name="campo_personalizado_oculto" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
	echo '<table class="form-table">';
	foreach( $meta_dados as $field ) {
		$meta = get_post_meta( $post->ID, $field['id'], true );
		echo '<tr>';
			if( $field['id']{0} != '_' )
				echo '<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
			
			echo '<td>';

			switch( $field['type'] ) {

				case 'text':
					echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" />
						<br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'textarea':
					echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea>
						<br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'checkbox':
					echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', ' />
						<label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
				break;

				case 'select':
					echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
					foreach( $field['options'] as $option ) {
						echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
					}
					echo '</select><br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'radio':
					foreach ( $field['options'] as $option ) {
						echo '<input type="radio" name="' . $field['id'] . '" id="' . $option['value'].'" value="' . $option['value'] . '" ', $meta == $option['value'] ? ' checked="checked"' : '',' /> 
							<label for="' . $option['value'] . '">' . $option['label'] . '</label><br />';
					}
				break;

				case 'checkbox_group':
					foreach ( $field['options'] as $option ) {
						echo '<input type="checkbox" value="' . $option['value'] . '" name="' . $field['id'] . '[]" id="' . $option['value'] . '"', $meta && in_array( $option['value'], $meta ) ? ' checked="checked"' : '', ' />  
							<label for="' . $option['value'] . '">' . $option['label'] . '</label><br />';
					}
					echo '<span class="description">' . $field['desc'] . '</span>';
				break;

				case 'number':
					if( $meta == '' )
						$meta = $field['min'];

					echo '<input type="number" name="' . $field['id'] . '" id="' . $field['id'] . '" min="' . $field['min'] . '" max="' . $field['max'] . '" value="' . $meta . '" />
						<br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'date':
					echo '<input type="date" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" />
						<br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'hora':
					echo '<input type="time" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" />
						<br /><span class="description">' . $field['desc'] . '</span>';
				break;

				case 'checkbox-ativo':
					echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" checked="checked" disabled />
						<label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
				break;

			} 
		echo '</td></tr>';
	}
	echo '</table>';
}

function configurar_salvamento( $meta_dados, $post_id ) {
	if( !wp_verify_nonce( $_POST['campo_personalizado_oculto'], basename( __FILE__ ) ) )
		return $post_id;

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	if( 'page' == $_POST['post_type'] ) {
		if( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} elseif( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
	}

	foreach( $meta_dados as $field ) {
		$old = get_post_meta( $post_id, $field['id'], true );
		$new = $_POST[$field['id']];

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $field['id'], $new );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	}
}

$meta_slider = array(

	array(
		'label'			=> 'Adicionar',
		'desc'			=> 'Esta publicação deve ser exibida no slider?',
		'id'			=> '_slider',
		'type'			=> 'checkbox',
	),

	array(
		'label'			=> 'Posição',
		'desc'			=> 'Qual é a posição desta página no slider?',
		'id'			=> '_posicao',
		'type'			=> 'number',
		'min'			=> 1
	),

);

function campos_slider_post() { add_meta_box( 'meta_slider', 'Destaque', 'form_slider', 'post', 'side', 'high' ); } add_action( 'add_meta_boxes', 'campos_slider_post' );
function campos_slider_page() { add_meta_box( 'meta_slider', 'Destaque', 'form_slider', 'page', 'side', 'high' ); } add_action( 'add_meta_boxes', 'campos_slider_page' );
function campos_slider_produto() { add_meta_box( 'meta_slider', 'Destaque', 'form_slider', 'produto', 'side', 'high' ); } add_action( 'add_meta_boxes', 'campos_slider_produto' );
function form_slider() { global $meta_slider; gera_formulario( $meta_slider ); }
function salvar_slider( $post_id ) { global $meta_slider; configurar_salvamento( $meta_slider, $post_id ); } add_action( 'save_post', 'salvar_slider' );

/* Funções personalizadas */

function mapa_do_site() {
	$retorno = '';
	$retorno .= '<div id="mapa-do-site">';
		$retorno .= wp_list_pages( array(
			// 'exclude'		=> '40, 42, 44, 54',
			'title_li'		=> '',
			'echo'			=> false,
			'hide_empty'	=> false
		) );

		$retorno .= wp_list_categories( array(
			'exclude'		=> '1',
			'taxonomy'		=> 'category',
			'title_li'		=> '',
			'echo'			=> false,
			'hide_empty'	=> false
		) );
	$retorno .= '</div>';

	return $retorno;
}

function mostrar_form_sidebar() {
	$retorno = '';

	$retorno .= '
		<form name="contato" id="contato" method="post" action="' . get_bloginfo( 'template_directory' ) . '/includes/send-contato.php">
			<div class="dado">
				<label for="nome">Nome</label>
				<div class="campo">
					<input type="text" name="nome" id="nome" placeholder="Campo obrigatório" />
				</div>
			</div>
			<div class="dado">
				<label for="email">E-mail</label>
				<div class="campo">
					<input type="text" name="email" id="email" placeholder="Campo obrigatório" />
				</div>
			</div>
			<div class="dado">
				<label for="telefone">Telefone</label>
				<div class="campo">
					<input type="text" name="telefone" id="telefone" placeholder="Campo obrigatório" />
				</div>
			</div>
			<div class="dado">
				<label for="mensagem">Mensagem</label>
				<div class="campo">
					<textarea name="mensagem" id="mensagem" placeholder="Campo obrigatório"></textarea>
				</div>
			</div>
			<input type="submit" name="btn-contato" value="Enviar contato" />
		</form>
	';

	return $retorno;
}

function mostrar_slider( $qtd ) {
	$slides = new WP_Query( array(
		'post_type'			=> 'any',
		'meta_key'			=> '_posicao',
		'posts_per_page'	=> $qtd,
		'order'				=> 'ASC',
		'orderby'			=> 'meta_value_num',
		'meta_query'		=> array(
			array(
				'key'			=> '_slider',
				'value'			=> 'on'
			)
		)
	) );

	if( $slides->have_posts() ) {
		echo '
			<div id="slider" class="limpo">
				<img src="' . get_bloginfo( 'template_directory' ) . '/images/glr-esquerda.png" class="navegacao esquerda" alt="Voltar" title="Voltar" />
				<div class="visivel">
					<ul class="limpo">
		';

		while( $slides->have_posts() ) {
			$slides->the_post();
			echo '
				<li>
			';

			if( has_post_thumbnail() )
				echo get_the_post_thumbnail( get_the_ID(), 'sliderP', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
			else
				echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/img-sliderP.jpg" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';

			echo '
					<div class="texto">
						<div class="limite limpo">
							<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
							<p>' . wp_html_excerpt( wp_strip_all_tags( get_the_content() ), 150, '...' ) . '</p>
							<a href="' . get_permalink() . '" class="saibamais">+</a>
						</div>
					</div>
				</li>
			';
		}

		echo '
					</ul>
				</div>
				<img src="' . get_bloginfo( 'template_directory' ) . '/images/glr-direita.png" class="navegacao direita" alt="Avançar" title="Avançar" />
			</div>
		';
	}

	wp_reset_postdata();
}

function mostrar_carrossel( $tipo ) {
	$posts = new WP_Query( array(
		'post_type'			=> $tipo,
		'posts_per_page'	=> -1
	) );

	if( $posts->have_posts() ) {
		echo '
			<div id="carrossel" class="limpo">
				<img src="' . get_bloginfo( 'template_directory' ) . '/images/glr-esquerda.png" class="navegacao esquerda" alt="Voltar" title="Voltar" />
				<div class="visivel">
					<ul class="limpo">
		';

		while( $posts->have_posts() ) {
			$posts->the_post();
			echo '<li>';
				if( has_post_thumbnail() )
					echo get_the_post_thumbnail( get_the_ID(), 'thumbM', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
				else
					echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/img-thumbM.jpg" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
			echo '</li>';
		}

		echo '
					</ul>
				</div>
				<img src="' . get_bloginfo( 'template_directory' ) . '/images/glr-direita.png" class="navegacao direita" alt="Avançar" title="Avançar" />
			</div>
		';
	}

	wp_reset_postdata();
}

function mostrar_destaques( $tipo, $qtd ) {
	$posts = new WP_Query( array(
		'post_type'			=> $tipo,
		'posts_per_page'	=> $qtd
	) );

	if( $posts->have_posts() )
		while( $posts->have_posts() ) {
			$posts->the_post();

			echo '
				<div class="palco colunas-quinto">
					<div class="produto limpo">
						<a href="' . get_permalink() . '">
			';

			if( has_post_thumbnail() )
				echo get_the_post_thumbnail( get_the_ID(), 'thumbM', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
			else
				echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/img-thumbM.jpg" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';

			echo '
						</a>
						<h3>' . get_the_title() . '</h3>
						<p>' . wp_html_excerpt( wp_strip_all_tags( get_the_content() ), 150, '...' ) . '</p>
						<a href="' . get_permalink() . '" class="saibamais">Saiba mais</a>
					</div>
				</div>
			';
		}

	wp_reset_postdata();
}

function mostrar_codigo_video( $url ) {
	$filtro1 = split( 'v=', $url );
	$url = $filtro1[sizeof( $filtro1 ) - 1];
	$filtro2 = split( '&', $url );
	$url = $filtro2[0];
	return $url;
}

function lista_destaque( $cat ) {
	echo '<div id="destaque-maquina">';
		echo '<div class="texto">';
			echo '<h3><strong>Máquina de Sorvete</strong> Sorvety</h3>';
			echo category_description( $cat );
		echo '</div>';

			$destaque = new WP_Query( array(
				'order_by'			=> 'date',
				'order'				=> 'ASC',
				'post_type'			=> 'any',
				'posts_per_page'	=> 6,
				'cat'				=> $cat
			) );

			if( $destaque->have_posts() ) {
				echo '<ul>';
				while( $destaque->have_posts() ) {
					$destaque->the_post();
					echo '<li>';

						echo '<a href="' . get_permalink() . '">';
						if ( has_post_thumbnail() )
							the_post_thumbnail( 'thumbM', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
						else
							echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/img-thumbM.jpg" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
						echo '</a>';

						echo '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
					echo'</li>';
				}
				echo '</ul>';
			}
			else

		echo '</div>';
	echo '</div>';

	wp_reset_postdata();
}

function listar_galeria( $id ) {
	$anexos = get_posts( array(
		'post_type'			=> 'attachment',
		'post_status'		=> 'inherit',
		'posts_per_page'	=> -1,
		'post_parent'		=> $id,
		'post_mime_type'	=> 'image'
	) );

	if( sizeof( $anexos ) > 1 ) {
		echo '<div class="galeria">';
		echo '<div class="miniaturas limpo">';
			foreach ( $anexos as $anexo )
				echo wp_get_attachment_image( $anexo->ID, 'thumbP', false, array( 'id' => 'thumbP', 'class' => 'thumbP', 'title' => get_the_title() ) );
		echo '</div>';

		echo '
			<div class="fundo"><div class="centralizador">
				<div class="frente">
		';
				echo '<ul>';
					foreach ( $anexos as $anexo )
						echo '<li>' . wp_get_attachment_image( $anexo->ID, 'thumbG', false, array( 'id' => 'thumbG', 'class' => 'thumbG', 'title' => get_the_title() ) ) . '</li>';
				echo '</ul>';
				echo '
					<div class="navegacao limpo">
						<img id="esquerda" src="' . get_bloginfo( 'template_directory' ) . '/images/glr-esquerda.png" />
						<img id="direita" src="' . get_bloginfo( 'template_directory' ) . '/images/glr-direita.png" />
						<img id="fechar" src="' . get_bloginfo( 'template_directory' ) . '/images/glr-fechar.png" />
					</div>
				';
		echo '
						</div>
					</div>
				</div>
			</div>
		';
	}
	else
		echo '<p class="erro">Nenhuma imagem cadastrada</p>';
}

function listar_detalhes( $id ) {
	$dados = get_post_meta( $id );

	if( sizeof( $dados) > 0 ) { 
		echo '<div class="detalhes">';

		while( $dado = key( $dados ) ) {
			if( $dado{0} != '_' ) {
				$valor = current( $dados );
				echo '
					<div class="linha limpo">
						<div class="dado">' . $dado . '</div>
						<div class="valor">' . $valor[0] . '</div>
					</div>
				';
			}
			next( $dados );
		}

		echo '</div>';
	}
}

function mostra_captcha( $label ) {
	$n1 = rand( 1, 9 );
	$n2 = rand( 1, 9 );

	$retorno = '';
	
	$retorno .= '		
		<input type="hidden" name="v1" value="' . $n1 . '" />
		<input type="hidden" name="v2" value="' . $n2 . '" />
		
		<div class="linha">
	';

	if( $label )
		$retorno .= '<label for="captcha">Captcha</label>';

	$retorno .= '
			<div class="campo">
				<input type="text" name="captcha" id="captcha" placeholder="' . $n1 . ' + ' . $n2 . '" />
			</div>
		</div>
	';

	return $retorno;
}

function lista_ultimas( $cat, $qtd ) {
	$ultimas = new WP_Query( array(
		'cat'				=> $cat,
		'posts_per_page'	=> $qtd
	) );

	if( $ultimas->have_posts() ) {
		echo '<div id="ultimas">';
			echo '<div class="cabecalho limpo">';
				echo '<h3>Notícias Sorvety</h3>';
				echo '<a href="' . get_category_link( $cat ) . '">Veja todas</a>';
			echo '</div>';
			echo '<div class="lista">';
				while( $ultimas->have_posts() ) {
					$ultimas->the_post();
					echo '<div class="bloco limpo">';

						echo '<a href="' . get_permalink() . '">';
							if( has_post_thumbnail() )
								the_post_thumbnail( 'thumbM', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
							else
								echo '<img src="' . get_bloginfo( 'template_directory' ) . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
						echo '</a>';

						echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
						echo '<p>' . wp_html_excerpt( wp_strip_all_tags( get_the_content() ), 250, '...' ) . '</p>';
						echo '<a class="saibamais" href="' . get_permalink() . '">+ Saiba mais</a>';
					echo '</div>';
				}
			echo '</div>';
		echo '</div>';
	}
	else
		echo '<h2>Nenhum post encontrado</h2>';

	wp_reset_postdata();
}

function mostrar_setor( $id ) {
	$setores = wp_get_post_terms( $id, 'setor' );
	return $setores[sizeof( $setores) - 1]->name;
}

function lista_pagamento( $id ) {
	$cartoes = get_the_terms( $id, 'cartao' );

	if( is_null( $cartoes ) )
		foreach( $cartoes as $cartao ) {
			echo '<img src="' . get_bloginfo( 'template_directory' ) . '/images/pag-' . $cartao->slug . '.png" alt="' . $cartao->name . '" title="' . $cartao->name . '" />';
		}
	else
		echo '<p class="erro">Nenhum cartão cadastrado</p>';
}

function listar_select_setores() {
	$setores = get_terms( 'setor', array(
		'orderby'			=> 'name',
		'hide_empty'		=> false,
	) );

	$categorias = array( 2, 3, 4, 5 );

	foreach( $setores as $setor )
		if( !in_array( $setor->term_id, $categorias ) )
			echo '<option id="' . $setor->name . '" value="' . $setor->name . '">' . $setor->name . '</option>';
}

function listar_select_horarios() {
	$horarios = array();

	for( $k = 0; $k < 48; $k++ ) {
		$h = (int) ( $k / 2 );
		$m = 30 * ( $k % 2 );

		if( $h < 10 ) $h = '0' . $h;
		if( $m < 10 ) $m = '0' . $m;

		array_push( $horarios, $h . ':' . $m );
	}

	foreach( $horarios as $horario )
		echo '<option value=' . $horario . '>' . $horario . '</option>';
}

function listar_checkbox_cartoes() {
	$cartoes = get_terms( 'cartao', array(
		'hide_empty'		=> false,
	) );

	foreach( $cartoes as $cartao )
		echo '<input type="checkbox" name="cartao[]" id="' . $cartao->slug . '" value="' . $cartao->name . '">
			<label for="' . $cartao->slug . '">' . $cartao->name . '</label>';
}

function listar_select_bairros() {
	global $wpdb;

	$bairros = $wpdb->get_results( "
		SELECT DISTINCT meta_value
		FROM $wpdb->postmeta
		WHERE meta_key = 'bairro'
		ORDER BY meta_value
	" );

	foreach( $bairros as $bairro ) {
		echo '<option ';

		if( isset( $_GET['b'] ) && ( $_GET['b'] == $bairro->meta_value ) )
			echo 'selected ';

		echo 'value="' . $bairro->meta_value . '" id="' . $bairro->meta_value . '">' . $bairro->meta_value . '</option>';
	}
}

function listar_horarios_agrupados() {
	$dias = array( // Sigla, Hora de abertura, Hora de encerramento, Conferido
		array( 'Dom', get_post_meta( get_the_ID(), 'dom-abre', true ), get_post_meta( get_the_ID(), 'dom-fecha', true ), false ),
		array( 'Seg', get_post_meta( get_the_ID(), 'seg-abre', true ), get_post_meta( get_the_ID(), 'seg-fecha', true ), false ),
		array( 'Ter', get_post_meta( get_the_ID(), 'ter-abre', true ), get_post_meta( get_the_ID(), 'ter-fecha', true ), false ),
		array( 'Qua', get_post_meta( get_the_ID(), 'qua-abre', true ), get_post_meta( get_the_ID(), 'qua-fecha', true ), false ),
		array( 'Qui', get_post_meta( get_the_ID(), 'qui-abre', true ), get_post_meta( get_the_ID(), 'qui-fecha', true ), false ),
		array( 'Sex', get_post_meta( get_the_ID(), 'sex-abre', true ), get_post_meta( get_the_ID(), 'sex-fecha', true ), false ),
		array( 'Sab', get_post_meta( get_the_ID(), 'sab-abre', true ), get_post_meta( get_the_ID(), 'sab-fecha', true ), false )
	);

	$repeticoes = array();

	for( $x = 0; $x < sizeof( $dias ); $x++ )

		if( !$dias[$x][3] && !( $dias[$x][1] == '00:00' && $dias[$x][2] == '00:00' ) ) {

			$repeticoes[$x] = array( $dias[$x][1] . ' às ' . $dias[$x][2], $dias[$x][0] );
			$dias[$x][3] = true;
			for( $y = $x + 1; $y < sizeof( $dias ); $y++ )

				if( ( $dias[$x][1] == $dias[$y][1] ) && ( $dias[$x][2] == $dias[$y][2] ) ) {

					array_push( $repeticoes[$x], $dias[$y][0] );
					$dias[$y][3] = true;

				}

		}

	foreach( $repeticoes as $repeticao ) {
		echo '<p>»';
			for( $k = 1; $k < sizeof( $repeticao ); $k++ ) {

				if( $k > 1 )
					echo ',';
				echo ' ' . $repeticao[$k];

			}
		echo ': ' . $repeticao[0] . '</p>';
	}
}

function motrar_id_taxonomia( $nome, $tax ) {
	$segmento = get_term_by( 'name', $nome, $tax );
	return $segmento->term_id;
}

function listar_lojas() {
	$destaque = new WP_Query( array(
		'order_by'			=> 'date',
		'order'				=> 'ASC',
		'post_type'			=> 'lojas',
		'posts_per_page'	=> 6
	) );

	if( $destaque->have_posts() ) {
		echo '<ul class="content-lojas">';
			while( $destaque->have_posts() ) {
				$destaque->the_post();
				$rua		= types_render_field("rua", array("raw"=>"true","separator"=>";"));
				$cidade		= types_render_field("cidade", array("raw"=>"true","separator"=>";"));
				$telefone	= types_render_field("telefone", array("raw"=>"true","separator"=>";"));
				$fax		= types_render_field("fax", array("raw"=>"true","separator"=>";"));
				$cnpj		= types_render_field("cnpj", array("raw"=>"true","separator"=>";"));
				$gerente	= types_render_field("gerente", array("raw"=>"true","separator"=>";"));
				$email		= types_render_field("email", array("raw"=>"true","separator"=>";"));

				echo '<li class="loja palco colunas-04">';
					echo '<a href="#" class="rubrik">';
						echo '<h3>' . get_the_title() . '</h3>';
						if ($rua)		echo '<p>' . $rua . '</p>';
						if ($cidade)	echo '<p>' . $cidade . '</p>';
						if ($telefone)	echo '<p>Telefone: ' . $telefone . '</p>';
						if ($fax)		echo '<p>Fax: ' . $fax . '</p>';
						if ($cnpj)		echo '<p>CNPJ: ' . $cnpj . '</p>';
						if ($gerente)	echo '<p>Gerente: ' . $gerente . '</p>';
						if ($email)		echo '<p>E-mail: ' . $email . '</p>';
					echo '</a>';
				echo '</li>';
			}
		echo '</ul>';
	}
	else {
		echo '<p class="erro">Desculpe, nenhuma loja cadastrada.</p>';
	}

	wp_reset_postdata();
}

?>
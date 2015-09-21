<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php
		if( $is_IE )
			echo '
				<script src="' . get_bloginfo( 'template_directory' ) . '/crossbrowser/html5.js"></script>
				<link rel="stylesheet" href="' . get_bloginfo( 'template_directory' ) . '/crossbrowser/html5.css" type="text/css" />
			';

		if( $is_gecko )
			echo '<style> body { margin-top: -32px; } </style>';
	?>

	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/koga.css" type="text/css" />

	<!-- Slider -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/js/slider/jquery.bxslider.css" type="text/css" />

	<!-- Menu -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/js/menu/slidebars.css" type="text/css" />

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/images/f-kogo-kogo.png" type="image/x-icon" />

	<!-- Font-Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/dinamismo.js"></script>
	<!-- <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/validacoes.js"></script> -->
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/slider.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/carrossel.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/galeria.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/mascaras.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/slider/jquery.bxslider.min.js"></script>

	<!-- Menu -->
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/menu/slidebars.js"></script>

	<!-- Functions -->
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/functions.js"></script>

	<?php wp_head(); ?>

	<!-- <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-50618679-1', 'guiadapraiagrande.com');
		ga('send', 'pageview');
	</script> -->
</head>

<body <?php body_class(); ?>>

    <div class="sb-slidebar sb-right">
    	<div class="content-menu">
    		<div class="content-header">
    			<div class="content-search middle">
    				<p>HHAHAHAs</p>
    			</div>
    			<div class="content-close middle">
    				<a class="close-menu">X</a>
    			</div>
    		</div>

    		<figure></figure>

			<?php wp_nav_menu( array( 'menu' => 'main menu' ) ); ?>

    	</div>
    </div>

	<div id="sb-site">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=378224022305498";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<header>
			<section>

				<?php
					if( is_home() || is_front_page() ) $marca = "h1";
					else $marca = "div";
				?>

				<<?php echo $marca; ?> id="logo" class="palco colunas-04">
					<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $marca; ?>>

				<div class="palco colunas-07 floatRight">
					<ul class="main-menu">
						<li>
							<a href="#">
							<i class="icon oleo"></i>
							troca de óleo</a>
						</li>
						<li>
							<a href="#">
							<i class="icon servicos"></i>
							Serviços</a>
						</li>
						<li>
							<a href="#">
							<i class="icon lojas"></i>
							Lojas</a>
						</li>
					</ul>

					<div class="menu">
						<a class="sb-toggle-right"><i class="fa fa-bars"></i></a>
					</div>
				</div>

			</section>
		</header>

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			echo '<div id="trilha" class="limpo">';
				echo '<section>';
					echo '<p class="titulo">Você está aqui:</p>';
					yoast_breadcrumb( '<p class="breadcrumbs">', '</p>' );
				echo '</section>';
			echo '</div>';
		} ?>

	<main>
<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/
?>

	</main>

	<footer>
		<section>

			<div id="navaux" class="palco colunas-03">
				<?php wp_nav_menu( array( 'theme_location' => 'auxiliar', 'menu_class' => 'menu' ) ); ?>

				<?php
					$ano = 2014;
					
					if( date( 'Y' ) - $ano > 0 )
						$ano .= ' - ' . date( 'Y' );
				?>

				<p>
					Copyright © <?php echo $ano; ?>. <?php bloginfo( 'name' ); ?>.
					<br />Todos os direitos reservados
				</p>
			</div>

			<div id="mapa" class="palco colunas-06">
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

			<div id="endereco" class="palco colunas-03">
				<?php
					echo '
						<h3>' . get_bloginfo( 'name' ) . '</h3>
						<p>
							' . get_option( 'endereco' ) . ' - ' . get_option( 'numero' ) . '<br />
							' . get_option( 'bairro' ) . ', ' . get_option( 'cidade' ) . ' - ' . get_option( 'estado' ) . '<br />
							' . get_option( 'cep' ) . '
						</p>
						<p>
							' . get_option( 'telefone' ) . '<br />
							<a href="mailto:' . get_option( 'email' ) . '">' . get_option( 'email' ) . '</a>
						</p>
					';
				?>
			</div>

		</section>
	</footer>

	<div id="assinatura">
		<section>
			<a href="http://www.coletivaweb.com.br/" target="_blank">
				<img src="http://www.coletivaweb.com.br/assinaturas-web/coletiva-branco-powered.png" alt="ColetivaWeb" title="ColetivaWeb" />
			</a>
		</section>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
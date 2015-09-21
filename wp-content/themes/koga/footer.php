<?php
/*
	* @package WordPress
	* @subpackage Coletiva_Theme
*/
?>

		</main>

		<?php if (is_page()) : ?>
			<div class="before_footer">
				<section>
					<div class="palco colunas-04 item lojas">
						<a href="<?php bloginfo( 'url' ); ?>/lojas" class="rubrik">nossas lojas</a>
					</div>
					<div class="palco colunas-04 item troca">
						<a href="<?php bloginfo( 'url' ); ?>/troca-de-oleo" class="rubrik">troca de grátis</a>
					</div>
					<div class="palco colunas-04 item recarga">
						<a href="<?php bloginfo( 'url' ); ?>/recarga-computadorizada" class="rubrik">recarga computadorizada</a>
					</div>
				</section>
			</div>
		<?php endif; ?>

		<footer>
			<section>
				<div class="nav-footer palco colunas-12">
					<div class="space">
						<div class="text">
							<h3 class="rubrik">procure koga-koga mais perto você:</h3>
						</div>
						<div class="listagem">
							<a href="#" data-type="maps">Google Maps</a>
							<a href="#" data-type="lojas" class="active">Listagem de Lojas</a>
						</div>
					</div>
				</div>
			</section>

			<div class="content_maps_lojas">
				<!-- Maps -->
				<div id="maps" class="item hidden palco colunas-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.4726402979554!2d-46.698654600000005!3d-23.623238900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50db31e479f9%3A0xdcc531b05dde182b!2sMorumbi+Shopping!5e0!3m2!1spt-BR!2sbr!4v1442721265996" width="100%" height="1000" frameborder="0" style="border:0; display:block;" allowfullscreen></iframe>
				</div>

				<!-- Listagem de lojas -->
				<section>
					<div id="lojas" class="item palco colunas-12">
						<?php listar_lojas(); ?>
					</div>
				</section>
			</div>
		</footer>

		<div class="facebook-footer">
			<section>
				<h2 class="rubrik_light">receba novidades</h2>

				<figure></figure>

				<div class="palco colunas-04 form">
					<form name="newsletter" id="newsletter" method="post" action="<?php bloginfo( 'template_directory' ); ?>/includes/send-newsletter.php">
						<div class="bloco">
							<div class="linha">
								<div class="dado grid colunas-12">
									<div class="campo"><input type="text" name="nome" id="nome" placeholder="Nome" /></div>
								</div>
							</div>
							<div class="linha">
								<div class="dado grid colunas-09">
									<div class="campo"><input type="text" name="email" id="email" placeholder="E-mail" /></div>
								</div>
								<div class="dado grid colunas-03">
									<div class="campo submit">
										<input type="submit" id="btn-contato" name="btn-contato" value="OK" />
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<figure></figure>

				<div class="assinatura">
					<a href="#" target="_blank">
						<img src="<?php bloginfo( 'template_directory'); ?>/images/ctrl-paper.jpg" alt="CtrlPaper" title="CtrlPaper" width="98" height="23" />
					</a>
				</div>
			</section>
		</div>

		<?php wp_footer(); ?>
	</div>
</body>
</html>
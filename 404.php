<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Commune_de_Saint-Martin_FR
 */

get_header();
?>

	<main id="primary" class="site-main">
		<article>

			<header class="entry-header">


			<h1 class="entry-title" style="background-image: url('<?php esc_url(header_image()) ?>')">	Oops! Cette page est introuvable.
			</h1>
			</header><!-- .page-header -->

			<div class="container">
			<div class="entry-content">
				<p>Il semble que rien n'ait été trouvé à cet endroit. Essayez peut-être l'un des liens ci-dessous  ?</p>
					<?php
					the_widget( 'WP_Widget_Recent_Posts' );
					?>
			</div><!-- .entry-content -->
		</div>


		</article>

	</main><!-- #main -->

<?php
get_footer();

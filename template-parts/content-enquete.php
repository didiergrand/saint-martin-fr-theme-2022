<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Commune_de_Saint-Martin_FR
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h3 class="entry-title">', '</h3>' );
			else :
				the_title( '<h3 class="entry-title">', '</h3>' );
			endif; ?>
		</header><!-- .entry-header -->

		<?php saint_martin_fr_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'saint-martin-fr' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
						),
						wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saint-martin-fr' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<hr>
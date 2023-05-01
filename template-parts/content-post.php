<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Commune_de_Saint-Martin_FR
 */

?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php endif; ?>
<header class="entry-header">
<?php 
		if (has_post_thumbnail( $post->ID ) ):
			$image_url = get_the_post_thumbnail_url( $post->ID, 'single-post-thumbnail' );
			echo '<h1 class="entry-title" style="background-image: url('.esc_url($image_url).')"><span>';
		else :			
	?>	
		<h1 class="entry-title" style="background-image: url('<?php esc_url(header_image()) ?>')"><span>	
	<?php
		endif;
		the_title();
		echo '</span></h1>';
	?>
	</header><!-- .entry-header -->

<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


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
</article><!-- #post-<?php the_ID(); ?> -->
</div>

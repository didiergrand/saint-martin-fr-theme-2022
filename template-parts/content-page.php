<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Commune_de_Saint-Martin_FR
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
	<?php 
		if (has_post_thumbnail( $post->ID ) ):
			$image_url = get_the_post_thumbnail_url( $post->ID, 'single-post-thumbnail' );
			echo '<h1 class="entry-title" style="background-image: url('.esc_url($image_url).')">';
		else :			
	?>	
		<h1 class="entry-title" style="background-image: url('<?php esc_url(header_image()) ?>')">	
	<?php
		endif;
		the_title();
		echo '</h1>';
	?>
	</header><!-- .entry-header -->
	<div class="container">
		<div class="entry-content">
			<?php
			the_content();

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

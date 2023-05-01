<?php
/**
 * Template Name: Agenda
 */
get_header();
?>

<main id="primary" class="site-main">	
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
  <div id="mises-a-lenquete" class="container">
    <?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'agenda',
					'meta_key' => 'Calendrier - Ordre',
					'orderby' => 'meta_value_num',
					'order' => 'ASC',
					'posts_per_page' => 20,
				);?>

				<?php $arr_posts = new WP_Query( $args ); ?>
				<?php if ( $arr_posts->have_posts() ) : ?>
				  <?php while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
                      <?php get_template_part( 'template-parts/content', 'agenda' ); ?>
				  <?php endwhile; ?>
				  <?php wp_reset_postdata(); // réinitialiser les données de la requête ?>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
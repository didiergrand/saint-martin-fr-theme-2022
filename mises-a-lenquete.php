<?php
/**
 * Template Name: Articles de mises à l'enquete
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
<div class="container">
		<div class="entry-content">
  <?php
  $category_id = get_cat_ID( 'actualites' );
  $args = array(
    'posts_per_page' => -1,
    'cat' => $category_id
  );
  $posts = get_posts( $args );
  if ( $posts ) {
    foreach ( $posts as $post ) {?>
        <article>
        <div class="entry-content">
        <header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
		</header><!-- .entry-header -->
            <?php
            setup_postdata( $post );
            the_content();
        ?></div>
        </article><hr><?
    }
    wp_reset_postdata();
  }
?></div>
</main>

<?php
get_footer();
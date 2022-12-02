<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Commune_de_Saint-Martin_FR
 */

get_header();
?>
<div class="header-image">
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
	<div id="quicklinks">
		<?php dynamic_sidebar( 'liens-1' ); ?>
	</div>
	<main id="primary" class="site-main">
		<div class="latest-news">
			<div class="container-l">


			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category_name' => 'actualites',
				'posts_per_page' => 10,
			);
			$arr_posts = new WP_Query( $args );
			
			if ( $arr_posts->have_posts() ) :
				while ( $arr_posts->have_posts() ) :
					$arr_posts->the_post();
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'home' );
				endwhile;
				the_posts_navigation();
			endif;?>


			</div>
		</div>
		<div class="bienvenue">
			<div class="container-l">
			<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'bienvenue',
					'posts_per_page' => 5,
				);
				$arr_posts = new WP_Query( $args );
				
				if ( $arr_posts->have_posts() ) :
					while ( $arr_posts->have_posts() ) :
						$arr_posts->the_post();
						?>
						<?php the_content(); ?>
						<?php
					endwhile;
				endif;?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();



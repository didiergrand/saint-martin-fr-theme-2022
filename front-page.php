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
<header class="entry-header">	
	<!-- <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
 -->

		<h1 class="entry-title" style="background-image: url('<?php esc_url(header_image()) ?>'); max-height:<?php echo get_custom_header()->height; ?>px">Bienvenue à Saint-Martin</h1>


</header>
	<div id="quicklinks" style="display:none">
		<?php dynamic_sidebar( 'liens-1' ); ?>
	</div>
	<main id="primary" class="site-main">
		<div class="latest-news">
			<div class="container-l" style="display:none">


			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category_name' => 'actualites',
				'posts_per_page' => 20,
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
			endif;?>


			</div>
		</div>
		<div class="bienvenue" style="display:none">
			<div class="container-m">
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



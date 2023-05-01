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

	<h1 class="entry-title"
		style="background-image: url('<?php esc_url(header_image()) ?>'); max-height:<?php echo get_custom_header()->height; ?>px">
		Bienvenue à Saint-Martin</h1>


</header>
<div id="quicklinks" style="display:none">
	<?php dynamic_sidebar('liens-1'); ?>
</div>
<main id="primary" class="site-main">
	<div id="latest-news" class="container-l">
		<div class="actualites">
			<h2>Actualités</h2>
			<div class="actualites-content">
				<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'actualites',
					'posts_per_page' => 20,
				); ?>
				<?php $arr_posts = new WP_Query($args); ?>
				<?php if ($arr_posts->have_posts()): ?>
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (is_sticky()): ?>
							<!-- Code pour afficher l'article épinglé ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php rewind_posts(); // réinitialiser la liste des articles ?>
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (!is_sticky()): ?>
							<!-- Code pour afficher les autres articles ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); // réinitialiser les données de la requête ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="pilier-public">

			<h2>Pilier public</h2>
			<div class="pilier-public-content">
				<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'pilier-public',
					'posts_per_page' => 20,
				); ?>
				<?php $arr_posts = new WP_Query($args); ?>
				<?php if ($arr_posts->have_posts()): ?>
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (is_sticky()): ?>
							<!-- Code pour afficher l'article épinglé ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php rewind_posts(); // réinitialiser la liste des articles ?>
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (!is_sticky()): ?>
							<!-- Code pour afficher les autres articles ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); // réinitialiser les données de la requête ?>
				<?php endif; ?>
			</div>
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category_name' => 'emploi',
				'posts_per_page' => 20,
			); ?>
			<?php $arr_posts = new WP_Query($args); ?>
			<?php if ($arr_posts->have_posts()): ?>

				<h2>Emploi</h2>
				<div class="pilier-public-content">
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (is_sticky()): ?>
							<!-- Code pour afficher l'article épinglé ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php rewind_posts(); // réinitialiser la liste des articles ?>
					<?php while ($arr_posts->have_posts()):
						$arr_posts->the_post(); ?>
						<?php if (!is_sticky()): ?>
							<!-- Code pour afficher les autres articles ici -->
							<?php get_template_part('template-parts/content', 'home'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); // réinitialiser les données de la requête ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="infos-diverses">
			<div id="st-martin-fr-sidebar" class="st-martin-fr-sidebar">
				<?php if (is_active_sidebar('st-martin-fr-sidebar')): ?>
					<?php dynamic_sidebar('st-martin-fr-sidebar'); ?>
				<?php endif; ?>
				<div class="agenda">
					<div class="agenda-content">
						<?php
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'category_name' => 'agenda',
							'meta_key' => 'Calendrier - Ordre',
							'orderby' => 'meta_value_num',
							'order' => 'ASC',
							'posts_per_page' => 20,
						); ?>
						<?php $arr_posts = new WP_Query($args); ?>
						<?php if ($arr_posts->have_posts()): ?>
							<div class="content">
								<h3>Agenda </h3>
								<div class="entry-content">
									<?php while ($arr_posts->have_posts()):
										$arr_posts->the_post(); ?>
										<!-- Code pour afficher l'article épinglé ici -->
										<?php get_template_part('template-parts/content', 'agenda'); ?>
									<?php endwhile; ?>
									<?php rewind_posts(); // réinitialiser la liste des articles ?>
									<?php wp_reset_postdata(); // réinitialiser les données de la requête ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Commune_de_Saint-Martin_FR
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area container-l">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #secondary -->

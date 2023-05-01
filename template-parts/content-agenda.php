<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Commune_de_Saint-Martin_FR
 */

$date_field_value = get_post_meta( get_the_ID(), 'Calendrier - Date', true );
$link_field_value = get_post_meta( get_the_ID(), 'Calendrier - Lien', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				echo $date_field_value;
				echo " : ";
				if($link_field_value != null) {
					the_title( '<b><a href="' .$link_field_value. '" rel="bookmark">', '</a></b>' );				
				} else {
					the_title( '<b>', '</b>' );
				}
				the_excerpt();
			?>
</article><!-- #post-<?php the_ID(); ?> -->
<hr>
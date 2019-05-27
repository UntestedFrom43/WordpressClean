<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clean
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- Кастом сайдбара -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

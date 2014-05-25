<?php
/**
 * The sidebar area for the template front-page.php
 *
 * @package Elucidate
 */

/* Return early if none of the front page widget areas are in use */
if ( ! is_active_sidebar( 'front-page-1' ) || ! is_active_sidebar( 'front-page-2' ) || ! is_active_sidebar( 'front-page-3' ) ) {
	return;
}
?>

<div id="front-page-widgets" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'front-page-1' ) ) : ?>
		<div class="front-page-1">
			<?php dynamic_sidebar( 'front-page-1' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-page-2' ) ) : ?>
		<div class="front-page-2">
			<?php dynamic_sidebar( 'front-page-2' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-page-3' ) ) : ?>
		<div class="front-page-3">
			<?php dynamic_sidebar( 'front-page-3' ); ?>
		</div>
	<?php endif; ?>
</div><!-- #front-page-widgets -->
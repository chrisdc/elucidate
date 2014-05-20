<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Elucidate
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="secondary-navigation" role="navigation">
				<?php wp_nav_menu( array(
	 				'theme_location' => 'social',
	 				'link_before' => '<span class="screen-reader-text">',
	 				'link_after' => '</span>'
					) ); ?>
			</nav>
		<?php endif; ?>

		<div class="site-info">
			<?php do_action( 'elucidate_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'elucidate' ), 'WordPress' ); ?></a>
			<br />
			<?php printf( __( 'Theme by %1$s.', 'elucidate' ), 'Christopher Crouch' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
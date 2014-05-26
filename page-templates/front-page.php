<?php
/**
 * Template Name: Front Page Template
 * An optional front page template
 *
 * This template provides a simple for a website front page.
 * Design consistes of a full-width featured image, followed 
 * by a full width text area, and then 3 horizontally arranged 
 * widget areas (front-page-1, front-page-2, front-page-3)
 *
 * @package Elucidate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( has_post_thumbnail() ) : ?>
					<p class="post-thumbnail">
						<?php the_post_thumbnail( 'elucidate-full-width' ); ?>
					</p><!-- .post-thumbnail -->
				<?php endif; ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					
					<?php edit_post_link( __( 'Edit', 'elucidate' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				</article><!-- #post -->
				

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'front'); ?>
<?php get_footer(); ?>

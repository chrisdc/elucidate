<?php
/**
 * Template Name: Front Page Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package edge
 *
 * Template Name: Page 1col
 */


get_header(); ?>

	<div class="row">

		<!-- Page Entries Column -->
		<div id="primary" class="col-md-12">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php function_exists( 'edge_breadcrumb' ) ? edge_breadcrumb( $post ) : false; ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</div>

	</div>
	<!-- /.row -->

<?php get_footer(); ?>

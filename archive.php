<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package edge
 */

get_header(); ?>

	<div class="row">

		<!-- Archive Entries Column -->
		<div id="primary" class="<?php edge_primary_class(); ?>">

		<?php if ( have_posts() ) : ?>
			<?php
				$title = '';

				if ( is_category() ) :
					$title = single_cat_title( '', false );

				elseif ( is_tag() ) :
					$title = single_tag_title( '', false );

				elseif ( is_author() ) :
					$title = sprintf( __( 'Author: %s', 'edge' ), '<span class="vcard">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					$title = sprintf( __( 'Day: %s', 'edge' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					$title = sprintf( __( 'Month: %s', 'edge' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'edge' ) ) . '</span>' );

				elseif ( is_year() ) :
					$title = sprintf( __( 'Year: %s', 'edge' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'edge' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					$title = __( 'Asides', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					$title = __( 'Galleries', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					$title = __( 'Images', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					$title = __( 'Videos', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					$title = __( 'Quotes', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					$title = __( 'Links', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
					$title = __( 'Statuses', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					$title = __( 'Audios', 'edge' );

				elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
					$title = __( 'Chats', 'edge' );

				else :
					_e( 'Archives', 'edge' );

				endif;
			?>
	
			<?php function_exists( 'edge_breadcrumb' ) ? edge_breadcrumb( false, $title ) : false; ?>

			<header class="page-header">
				<h1 class="page-title"><?php echo $title; ?></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<!-- Pager -->
			<div class="text-center">
				<?php function_exists( 'wp_pagenavi' ) ? wp_pagenavi() : edge_paging_nav(); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>
	</div>
	<!-- /.row -->
<?php get_footer(); ?>

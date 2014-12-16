<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'ommu_notoboso' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit Page', 'ommu_notoboso' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

<?php
/**
 * The template for displaying posts in the Link post format on index and archive pages.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ommu_notoboso' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
        	<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>"><i class="fa fa-link"></i> <?php echo get_post_format_string( 'link' ); ?></a>
			<?php ommu_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'ommu_notoboso' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' ); ?>
			<?php get_template_part( 'content', 'author' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

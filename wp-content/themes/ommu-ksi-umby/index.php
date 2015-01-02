<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ommu_tugujogja
 * @since Ommu-KSI-TuguJogja 5.0.3
 */
 
$class = $wp->request;

get_header(); ?>

<div id="<?php echo $class; ?>" class="body">
	<div class="container clearfix">
		<div class="before"></div>
		<div class="after"></div>
		<div class="content">
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>
			
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php ommu_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php if ( current_user_can( 'edit_posts' ) ) :
					// Show a different message to a logged-in user who can add posts.
				?>
					<article id="post-0" class="post no-results not-found">
						<h1 class="page-title"><?php _e( 'No posts to display', 'ommu_tugujogja' ); ?></h1>
						<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'ommu_tugujogja' ), admin_url( 'post-new.php' ) ); ?></p>
					</article>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			<?php endif; // end have_posts() check ?>
		</div>
		
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>
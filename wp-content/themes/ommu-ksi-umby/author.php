<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ommu_tugujogja
 * @since Ommu-KSI-TuguJogja 5.0.3
 */
 
$arrAttr = explode('/', $wp->request); 
$class = $arrAttr[0];

get_header(); ?>

<div id="blog" class="body single-page">
	<div class="container clearfix">
		<div class="before"></div>
		<div class="after"></div>
		<div class="content" id="<?php echo $class;?>">    
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>

			<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
				<?php if ( get_the_author_meta( 'description' ) ) : ?>		
					<?php printf( __( 'Author Archives', 'ommu_tugujogja' )); ?>
				<?php else : ?>
					<?php printf( __( 'Author Archives: %s', 'ommu_tugujogja' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
				<?php endif; ?>
				</h1>
				
				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ommu_author_bio_avatar_size', 72 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'ommu_tugujogja' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
					</div><!-- .author-description	-->
				</div><!-- .author-info -->
				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php ommu_content_nav( 'nav-below' ); ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>
		
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>
<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage ommu_tugujogja
 * @since Ommu-KSI-TuguJogja 5.0.3
 */
 
$arrAttr = explode('/', $wp->request); 
$class = $arrAttr[0];
$idAttr = in_array($class, array('courses','lessons','topic')) ? 'courses' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!post_password_required() && !is_attachment()) {?>
		<?php the_post_thumbnail(); ?>
	<?php } ?>
	
	<?php if ( is_single() ) : ?>
		<h1 class="title">
			<?php the_title(); ?>
		</h1>
	<?php else : ?>
		<a class="title" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ommu_tugujogja' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	<?php endif; ?>
	
	<?php if (is_search()) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<?php if(is_single()) : ?>
			<div class="entry-content clearfix">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'ommu_tugujogja' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'ommu_tugujogja' ), 'after' => '</div>' ) ); ?>
			</div>
		<?php else : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="desc <?php echo is_single() ? 'detail' : '';?> clearfix">		
		<?php if(is_single()) : ?>
			<?php 
			if($class != in_array($class, array('courses','lessons','topic'))) {
				ommu_entry_meta();
			}?>
			<?php if ( comments_open() ) : ?>
				<?php comments_popup_link(__( 'Leave a reply', 'ommu_tugujogja' ), __( '1 Reply', 'ommu_tugujogja' ), __( '% Replies', 'ommu_tugujogja' ), 'comment-link'); ?>
			<?php endif; // comments_open() ?>
		<?php else : ?>
			<a class="more" href="<?php the_permalink(); ?>">Readmore</a>
			<?php if ( comments_open() ) : ?>
				<?php comments_popup_link(__( '0', 'ommu_tugujogja' ), __( '1', 'ommu_tugujogja' ), __( '%', 'ommu_tugujogja' ), 'comment-link'); ?>
			<?php endif; // comments_open() ?>
		<?php endif; ?>
	</div>
	
	<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>	
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ommu_author_bio_avatar_size', 72 ) ); ?>
			</div><!-- .author-avatar -->
			<div class="author-description">
				<h2><?php printf( __( 'About %s', 'ommu_tugujogja' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&raquo;</span>', 'ommu_tugujogja' ), get_the_author() ); ?>
					</a>
				</div><!-- .author-link	-->
			</div><!-- .author-description -->
		</div><!-- .author-info -->
	<?php endif; ?>

</article>
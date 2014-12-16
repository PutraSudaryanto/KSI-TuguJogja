<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
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
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'ommu_notoboso' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				
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
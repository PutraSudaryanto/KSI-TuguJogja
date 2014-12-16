<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'ommu_notoboso' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
					
				<header class="archive-header">
				<?php if ( category_description() ) : // Show an optional category description ?>
					<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
				</header>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/* Include the post format-specific template for the content. If you want to
					 * this in a child theme then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;

				ommu_content_nav( 'nav-below' );
				?>

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
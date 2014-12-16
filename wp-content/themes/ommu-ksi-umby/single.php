<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
 
$arrAttr = explode('/', $wp->request); 
$class = $arrAttr[0];
$idAttr = in_array($class, array('courses','lessons','topic')) ? 'courses' : '';

get_header(); ?>

<div id="blog" class="body single-page">
	<div class="container clearfix">
		<div class="before"></div>
		<div class="after"></div>
		<div class="content" id="<?php echo $idAttr;?>">    
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<?php if($idAttr != 'courses') {?>
					<nav class="nav-single">
						<?php previous_post_link( '<span class="nav-previous">%link</span>', '%title' ); ?>
						<?php next_post_link( '<span class="nav-next">%link</span>', '%title' ); ?>
					</nav>
				<?php } if ( comments_open() ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>

			<?php endwhile; ?>		
		</div>
		
		<div class="sidebar <?php echo $idAttr;?>">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
 
$class = $wp->request;
	
get_header();?>

	<?php if(!is_front_page()) {?>
		<div id="<?php echo $class; ?>" class="body">
			<div class="container clearfix">
				<div class="before"></div>
				<div class="after"></div>
				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>
				
				<?php if($class != 'faq') {?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if(!in_array($class, array('your-profile','register','lostpassword','login'))) {?>
							<h1><?php the_title(); ?></h1>
						<?php }
						/*if($class == 'your-profile' ) {?>
							<div class="profile-menu">
								<ul>
									<li id="profile" class="active"><a href="javascript:void(0);" title="Profile">Profile</a></li>
									<li id="course"><a href="javascript:void(0);" title="Course">Course</a></li>
								</ul>
							</div>
						<?php }*/?>
						<?php the_content(); ?>
						<?php //get_template_part( 'content', 'page' ); ?>
						<?php //comments_template( '', true ); ?>
					<?php endwhile; ?>
					
				<?php } else {?>
					<div class="content" id="<?php echo $idAttr;?>">    
						<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						<?php endwhile; ?>		
					</div>
					
					<div class="sidebar <?php echo $idAttr;?>">
						<?php get_sidebar(); ?>
					</div>
				<?php }?>
			</div>
		</div>
		<?php //get_sidebar(); ?>
	
	<?php } else {?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }?>

<?php get_footer(); ?>
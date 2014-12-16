<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */

if($wp->request == 'courses') {
	$class = $wp->request;
} else {
	$arrAttr = explode('/', $wp->request); 
	$class = $arrAttr[0];
}?>

<?php if(!in_array($class, array('courses','lessons','topic'))) {?>
	<?php get_sidebar('component-search'); ?>
	<?php get_sidebar('component-recentpost'); ?>
	<?php get_sidebar('component-archives'); ?>
	
<?php } else {?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
<?php }?>
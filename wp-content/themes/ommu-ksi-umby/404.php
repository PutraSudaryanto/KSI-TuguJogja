<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */

get_header(); ?>

	<div class="main home-preview-large m-error">
		<div class="container">
			<h3><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'ommu_notoboso' ); ?></h3>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ommu_notoboso' ); ?></p>
			<form id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
				<fieldset class="clearfix">
					<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
					<input id="searchsubmit" type="submit" value="Search">
				</fieldset>
			</form>
			<?php //get_search_form(); ?>
		</div>
	</div>

<?php get_footer(); ?>
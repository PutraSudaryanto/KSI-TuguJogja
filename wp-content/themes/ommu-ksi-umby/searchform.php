<?php
/**
 * The template for displaying the search form.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<fieldset class="clearfix">
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'ommu_notoboso'); ?>">
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'ommu_notoboso'); ?>">
	</fieldset>
</form>
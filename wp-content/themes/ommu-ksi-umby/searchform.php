<?php
/**
 * The template for displaying the search form.
 *
 * @package WordPress
 * @subpackage ommu_tugujogja
 * @since Ommu-KSI-TuguJogja 5.0.3
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<fieldset class="clearfix">
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'ommu_tugujogja'); ?>">
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'ommu_tugujogja'); ?>">
	</fieldset>
</form>
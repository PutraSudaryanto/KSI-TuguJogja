<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
?>

<article id="post-0" class="post no-results not-found">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'ommu_notoboso' ); ?></h1>
	<p><?php _e( 'Apologies, but no results were found. Perhaps another search will help you find what you&#39;re looking for.', 'ommu_notoboso' ); ?></p>
	<form id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
		<fieldset class="clearfix">
			<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
			<input id="searchsubmit" type="submit" value="Search">
		</fieldset>
	</form>
</article>
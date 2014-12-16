<aside class="search">
	<form id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
		<fieldset class="clearfix">
			<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
			<input id="searchsubmit" type="submit" value="Search">
		</fieldset>
	</form>
</aside>
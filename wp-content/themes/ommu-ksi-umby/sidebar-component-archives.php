<aside class="archives">
	<h3>Archives</h3>
	<ul>
		<?php 
		$args = array(
			'type' => 'monthly',
			'limit' => '',
			'format' => 'html', 
			'before' => '',
			'after' => '',
			'show_post_count' => false,
			'echo' => 1,
			'order' => 'DESC'
		);
		wp_get_archives($args); ?>
	</ul>
</aside>
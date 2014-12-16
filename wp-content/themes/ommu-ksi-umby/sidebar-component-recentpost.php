<?php
	$args = array(
		'numberposts' => '5',
		'post_status' => 'publish',
	);
	$recent_posts = wp_get_recent_posts($args);
	if($recent_posts != null) {
?>
<aside class="recent-posts">
	<h3>Recent Posts</h3>
	<ul>
		<?php
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
			}
		?>
	</ul>
</aside>
<?php }?>
<ul class="SUCFilter">
	<?php 

		$args = array(
			'post_type' => 'paqueterias-en',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'post_status' => 'draft',
			'order' => 'ASC'
			); 

		$ciudades = get_posts($args);

		foreach($ciudades as $ciudad):
	?>
		<li><a href="<?php echo get_permalink($ciudad->ID);?>"><?php echo ucfirst(str_replace("-", " ", $ciudad->post_name)); ?></a></li>
	<?php endforeach; ?>
	</ul>
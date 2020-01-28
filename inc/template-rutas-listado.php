<h2 class="text-center">Enlaces a las ciudades hijas del mismox padre:</h2>
<p class="text-center">
<?php 

global $post;
$post_parent = $post->post_parent;
if($post_parent == 0){
	$post_parent = $post->ID;
}

echo $post_parent;

$args = array(
	'post_type' => 'envios',
	'post_parent' => $post_parent,
	'post__not_in' => array($post_parent),
    'post_per_page' => -1
	);

$rutas = get_posts($args);
foreach($rutas as $ruta) : ?>

	<a class="btn btn-azulOut" href="<?php echo get_permalink($ruta->ID); ?>"><?php echo $ruta->post_title; ?></a>
<?php endforeach; ?>
</p>
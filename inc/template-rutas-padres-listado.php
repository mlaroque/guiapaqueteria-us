<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2 class="text-center">Envíos a otros países:</h2>

      <p class="text-center">
<?php 

global $post;
$post_parent = $post->post_parent;
if($post_parent == 0){
	$post_parent = $post->ID;
}

$args = array(
	'post_type' => 'envios',
	'post_parent' => 0,
	'post__not_in' => array($post->ID,$post_parent),
    'post_per_page' => -1
	);

$rutas = get_posts($args);
foreach($rutas as $ruta) : ?>

	<a class="btn btn-azulOut" href="<?php echo get_permalink($ruta->ID); ?>"><?php echo $ruta->post_title; ?></a>
<?php endforeach; ?>
</p>

    </div>
  </div>
</div>
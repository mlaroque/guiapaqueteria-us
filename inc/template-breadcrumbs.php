<?php  
global $post;
$listado_post = null;

if($post->post_type === "empresas"){
  $listado_post = get_post(15);
} else if ($post->post_type === "rastreador") {
  $listado_post = get_post(9);
}else if ($post->post_type === "guias") {
  $listado_post = get_post(366);
}



?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<ol class="breadcrumb">
				<li><a href="https://guiapaqueteria.com/us">Inicio</a></li>
				<?php if($post->post_type !== "page"): ?>
			    <?php if($listado_post): 
				$parent_post_title = get_post_meta($listado_post->ID, 'page_breadcrumb_title', true);
                if($parent_post_title === ""){
				$parent_post_title = $listado_post->post_title;
			}?>
				<li><a href="<?php echo get_permalink($listado_post->ID);?>"><?php echo $parent_post_title;?></a></li>
					<?php endif; ?>
				<?php endif; ?>


			
				<li class="active"><?php echo $post->post_title;?></li>
			</ol>
		</div>
	</div>
</div>
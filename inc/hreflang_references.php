<?php
global $post;
//Get current url
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'/us/') !== false):
?>

<?php 
	if($post->ID === 9):
?>
	<link rel="alternate" href="https://guiapaqueteria.com/rastreador/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />
<?php elseif($post->ID === 5): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />		
<?php elseif($post->ID === 15): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/empresas-de-paqueteria-mensajeria/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 46): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/ups/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 55): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/estafeta/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 160): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/dhl/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 77): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/aeromexico-cargo/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 84): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/multipack/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 119): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/tufesa/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 132): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/pakmail/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 155): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/paqueteria/fedex/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
<?php elseif($post->ID === 366): ?>
	<link rel="alternate" href="https://guiapaqueteria.com/noticias/" hreflang="x-default" />
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="es-us" />	
	
<?php endif; ?>
<?php else: ?>
<?php 
	if($post->ID === 4160):
?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/rastreador/" hreflang="es-us" />
<?php elseif($post->ID === 4): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/" hreflang="es-us" />		
<?php elseif($post->ID === 3170): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas-de-paqueteria-mensajeria/" hreflang="es-us" />	
<?php elseif($post->ID === 50): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas-de-paqueteria-mensajeria/" hreflang="es-us" />	
<?php elseif($post->ID === 48): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/estafeta/" hreflang="es-us" />	
<?php elseif($post->ID === 49): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/dhl/" hreflang="es-us" />	
<?php elseif($post->ID === 54): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/aeromexico-cargo/" hreflang="es-us" />	
<?php elseif($post->ID === 56): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/multipack/" hreflang="es-us" />	
<?php elseif($post->ID === 4287): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/tufesa/" hreflang="es-us" />	
<?php elseif($post->ID === 3592): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/pakmail/" hreflang="es-us" />	
<?php elseif($post->ID === 29): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/empresas/fedex/" hreflang="es-us" />
<?php elseif($post->ID === 1922): ?>
	<link rel="alternate" href="<?php echo esc_url( get_permalink()); ?>" hreflang="x-default" />
	<link rel="alternate" href="https://guiapaqueteria.com/us/noticias/" hreflang="es-us" />	

<?php endif; ?>


<?php endif; ?>

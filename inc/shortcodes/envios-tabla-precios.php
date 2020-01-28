<?php
  global $post;
  global $tipo_tabla;
  global $num_lineas;
  $tabla = array();


  $titulo_tabla = get_post_meta( $post->ID, 'tabla_titulo_'.$tipo_tabla, true );

  for($i=0;$i<$num_lineas;$i++){

      $linea_tabla = new stdClass();
      $linea_tabla->servicio = get_post_meta( $post->ID, 'tabla_servicio_'.$tipo_tabla.$i, true );
      $linea_tabla->precio = get_post_meta( $post->ID, 'tabla_precio_'.$tipo_tabla.$i, true );
      $linea_tabla->entrega_en = get_post_meta( $post->ID, 'tabla_entrega_en_'.$tipo_tabla.$i, true );
      $linea_tabla->entrega_a = get_post_meta( $post->ID, 'tabla_entrega_a_'.$tipo_tabla.$i, true );
      array_push($tabla, $linea_tabla);
  }


?>

<table class="shadow">
  <thead>
    <tr>
      <th class="text-center" colspan="4"><?php echo $titulo_tabla; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tabla as $linea_tabla):?>
    <tr>
      <td>
        <p class="tabTit">Nombre del servicio</p>
        <?php echo $linea_tabla->servicio; ?>
      </td>
      <td>
        <p class="tabTit">Precio</p>
        <?php echo $linea_tabla->precio; ?>
      </td>
      <td>
        <p class="tabTit">Entrega en</p>
        <?php echo $linea_tabla->entrega_en; ?>
      </td>
      <td>
        <p class="tabTit">Entrega a</p>
        <?php echo $linea_tabla->entrega_a; ?>
      </td>
    </tr>  
    <?php endforeach; ?>  
  </tbody>
</table>
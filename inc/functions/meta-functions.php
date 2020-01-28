<?php



/* Adds a meta box to the post edit screen */
add_action( 'add_meta_boxes', 'guiapaq_add_custom_box' );
function guiapaq_add_custom_box() {

        /**********PAQUETERIA**************/
        add_meta_box(
            'guiapaq_paqueteria_data_id',            // Unique ID
            'Detalles de paqueteria',      // Box title
            'guiapaq_inner_custom_box',  // Content callback
            'empresas'                      // post type
        );
        /**********RUTAS**************/
        add_meta_box(
            'guiapaq_envios_precio_data_id',            // Unique ID
            'Precios de rutas',      // Box title
            'guiapaq_envios_precios_inner_custom_box',  // Content callback
            'envios'                      // post type
        );
}


/**********PAQUETERIA**************/

/* Prints the box content */
function guiapaq_inner_custom_box( $post ) {
?>
    <input name="telefono" value="<?php echo get_post_meta( $post->ID, 'paqueteria_tel', true ); ?>" placeholder="Telefono" style="width:100%;"/><br />
	<input name="web" value="<?php echo get_post_meta( $post->ID, 'paqueteria_web', true ); ?>" placeholder="Página internet" style="width:100%;" /><br />
	<input name="paqueteria_contacto" value="<?php echo get_post_meta( $post->ID, 'paqueteria_contacto', true ); ?>" placeholder="Contacto" style="width:100%;" /><br />
    <input name="paqueteria_att-tel" value="<?php echo get_post_meta( $post->ID, 'paqueteria_att-tel', true ); ?>" placeholder="Atención Telefonica" style="width:100%;"/><br />


<?php
}

/**********RUTAS**************/
$tablas = array();
$tabla = new stdClass(); $tabla->titulo = "Documento"; $tabla->filas = 4; $tabla->slug = "documento"; array_push($tablas, $tabla);
$tabla = new stdClass(); $tabla->titulo = "Paquete de 1kg"; $tabla->filas = 4; $tabla->slug = "1kg"; array_push($tablas, $tabla);
$tabla = new stdClass(); $tabla->titulo = "Paquete de 5kg"; $tabla->filas = 4; $tabla->slug = "5kg"; array_push($tablas, $tabla);
$tabla = new stdClass(); $tabla->titulo = "Paquete de 30kg"; $tabla->filas = 4; $tabla->slug = "30kg"; array_push($tablas, $tabla);
/* Prints the box content */
function guiapaq_envios_precios_inner_custom_box( $post ) {
    global $tablas;
    foreach($tablas as $tabla):
?>
    <h2><?php echo $tabla->titulo; ?></h2>
    <table>
        <thead>
            <th width="20%">Servicio</th>
            <th width="20%">Precio</th>
            <th width="20%">Entrega en</th>
            <th width="20%">Entrega a</th>
        </thead>
        <tbody>
            <?php for($i=0;$i<$tabla->filas;$i++): ?>
            <tr>
                <td><input name="tabla_servicio_<?php echo $tabla->slug.$i;?>" value="<?php echo get_post_meta( $post->ID, 'tabla_servicio_'.$tabla->slug.$i, true );?>"/></td>
                <td><input name="tabla_precio_<?php echo $tabla->slug.$i;?>" value="<?php echo get_post_meta( $post->ID, 'tabla_precio_'.$tabla->slug.$i, true );?>"/></td>
                <td><input name="tabla_entrega_en_<?php echo $tabla->slug.$i;?>" value="<?php echo get_post_meta( $post->ID, 'tabla_entrega_en_'.$tabla->slug.$i, true );?>"/></td>
                <td><input name="tabla_entrega_a_<?php echo $tabla->slug.$i;?>" value="<?php echo get_post_meta( $post->ID, 'tabla_entrega_a_'.$tabla->slug.$i, true );?>"/></td>
            </tr>
            <?php endfor;?>
        </tbody>
    </table>


<?php endforeach;
}

function save_postdata( $post_id ) {

	global $post;

    if($post->post_type === 'empresas'){
        basic_input_text_meta_save('web',$post_id);
        basic_input_text_meta_save('telefono',$post_id);
        basic_input_text_meta_save('paqueteria_contacto',$post_id);
        basic_input_text_meta_save('sucursal_tel',$post_id);
        basic_input_text_meta_save('paqueteria_att-tel',$post_id);
    }else if($post->post_type === 'envios'){
        global $tablas;
        foreach($tablas as $tabla){
            update_post_meta( $post_id, 'tabla_titulo_'.$tabla->slug,$tabla->titulo);
            for($i=0;$i<$tabla->filas;$i++){
                basic_input_text_meta_save('tabla_servicio_'.$tabla->slug.$i,$post_id);
                basic_input_text_meta_save('tabla_precio_'.$tabla->slug.$i,$post_id);
                basic_input_text_meta_save('tabla_entrega_en_'.$tabla->slug.$i,$post_id);
                basic_input_text_meta_save('tabla_entrega_a_'.$tabla->slug.$i,$post_id);
            }
        }
    }


}

add_action( 'save_post', 'save_postdata' );


function basic_input_text_meta_save($input_name, $post_id){

    global $_POST;
    if ( array_key_exists($input_name, $_POST ) ) {
            $meta_exists = update_post_meta( $post_id,
               $input_name,
                $_POST[$input_name]
         );     
    }       

}

?>
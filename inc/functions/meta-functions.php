<?php

/**********PAQUETERIA**************/

/* Adds a meta box to the post edit screen */
add_action( 'add_meta_boxes', 'guiapaq_add_custom_box' );
function guiapaq_add_custom_box() {
    $screens = array( 'paqueteria' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'guiapaq_paqueteria_data_id',            // Unique ID
            'Detalles de paqueteria',      // Box title
            'guiapaq_inner_custom_box',  // Content callback
             $screen                      // post type
        );
    }
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


/**********PAQUETERIA**************/

function paqueterias_save_postdata( $post_id ) {
	
    basic_input_text_meta_save('web',$post_id);
    basic_input_text_meta_save('telefono',$post_id);
    basic_input_text_meta_save('paqueteria_contacto',$post_id);
    basic_input_text_meta_save('sucursal_tel',$post_id);
    basic_input_text_meta_save('paqueteria_att-tel',$post_id);

}

add_action( 'save_post', 'paqueterias_save_postdata' );


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